<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(){
        $jsonConds = json_encode(array('email'=>'eva@iifun.com.tw'));

        $hashVal = md5("0H033548174551339554$jsonConds");
        $newStr ="";
        for($i=0;$i < strlen($hashVal) && substr($hashVal,$i,2) !== '00' ;$i=$i+2){
            $newStr = $newStr.hex2bin(substr($hashVal,$i,2));
        };
        $newStr64 = base64_encode($newStr);
        $url = 'http://dev.iifun.com.tw/aurora_group_xweb/MemberWS/GetMemberRight?jsonConds='.$jsonConds.'&hashVal='.$newStr64;

        //Guzzle外部應用 類似ajax 的概念
        $client = new \GuzzleHttp\Client();
        $request = $client->get($url);    
        $response = $request->getBody();

        return view('test.index',['res'=>$response]);

    }
}

//792081381176916514534702355118210128214107

//base 64 = T9CKdUWlkSJGFzd20oDWaw==