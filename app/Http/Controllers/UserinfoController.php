<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user_info;

class UserinfoController extends Controller
{
    //
    public function check(Request $req)
    {
        $usermail = $req->input('email');
        $jsonConds = json_encode(array('email' => $usermail));

        $hashVal = md5("0H033548174551339554$jsonConds");
        $newStr = "";
        for ($i = 0; $i < strlen($hashVal) && substr($hashVal, $i, 2) !== '00'; $i = $i + 2) {
            $newStr = $newStr . hex2bin(substr($hashVal, $i, 2));
        };
        $newStr64 = base64_encode($newStr);
        $url = 'http://www.aurora.com.tw/MemberWS/GetMemberRight?jsonConds=' . $jsonConds . '&hashVal=' . $newStr64;

        //Guzzle外部應用 類似ajax 的概念
        $client = new \GuzzleHttp\Client();
        $request = $client->get($url);
        $response = $request->getBody();

        $res_msg = json_decode($response)->ErrDesc;

        //震旦API回傳 驗證失敗時 導回上一頁 並顯示錯誤
        $thisEmail = $req->input('email');
        $thisName = $req->input('name');

        if ($res_msg == "無此會員或者無登入(認證)之權限") {
            return back()->with('message', $res_msg)->withInput();
        } else {

            //判斷此Email 是否已經存在DB內
            //select Count() from user_infos where email = '此人輸入Email';
            // $EmailInDb = DB::table('user_infos')->where('email', $thisEmail)->count();
            // if ($EmailInDb >= 1) {
                //如果DB內有此Email
                // $NameInDb = DB::table('user_infos')->where('email', '=', $thisEmail)->where('name', '=', $thisName)->count();
                // if ($NameInDb == 0) {
                    //如果有EMail 但姓名和之前儲存的不同時，退回去
                //     return back()->with('message', '請輸入與您上次登入時相同的姓名!')->withInput();
                // } else {
                    //如果相同
                    //震旦回傳 成功 ，將此人一些資訊壓入Session並跳轉到我要參加頁面
                    // $req->session()->put('email_status', 'success');
                    // $req->session()->put('client_name', $thisName);
                    // $req->session()->put('email', $thisEmail);
                    // return redirect('/IWantJoin');
                // }
            // } else {
                //如果DB沒存過此人Email
                $req->session()->put('email_status', 'success');
                $req->session()->put('client_name', $thisName);
                $req->session()->put('email', $thisEmail);
                //如果 震旦回傳 成功 將此人資料儲存下來
                $userinfo = new user_info([
                    'name' => $req->input('name'),
                    'email' => $req->input('email'),
                    'luckydraw' => 0,
                ]);
                $userinfo->save();
                return redirect('/IWantJoin');
            // }
        }
    }
}
