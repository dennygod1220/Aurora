<?php

namespace App\Http\Controllers;

use App\Slot_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IWantJoinController extends Controller
{
    //
    public function index(Request $req)
    {
        $client_name = $req->session()->get('client_name');
        $client_email = $req->session()->get('email');

        $now = date('Y-m-d');
        $get_play_count = DB::table('slot_infos')->where('email', $client_email)->where('playdate', $now)->count();

        $play_count;
        //如果DB內次數=0 表示這人還沒玩過
        //如果DB內次數在0~9之間 表示這人還能玩
        //如果DB內次數大於=9表示這人今天不能玩了
        if ($get_play_count == 0) {
            $play_count = 9;
        } else if ($get_play_count > 0 && $get_play_count < 9) {
            $play_count = 9 - $get_play_count;
        } else {
            $play_count = 0;
            return view('IWantJoin2', ['client_name' => $client_name, 'client_email' => $client_email]);
        }

        //===========================
        //亂數產生 0~9999 以隨機產生的數值範圍指定獎品
        $prize0 = rand(0, 9999);
        $prize = (int) $prize0;
        if ($prize > 0 && $prize < 3) {
            //震旦商品抵用卷100元
            $prize_arr0 = 0;
            $prize_arr1 = 0;
            $prize_arr2 = 0;
        } else if ($prize > 3000 && $prize < 8000) {
            //震旦通訊時
            $prize_arr0 = 1;
            $prize_arr1 = 1;
            $prize_arr2 = 1;
        } else if ($prize > 8 && $prize < 11) {
            //毛巾蛋糕
            $prize_arr0 = 2;
            $prize_arr1 = 2;
            $prize_arr2 = 2;
        } else if ($prize > 11 && $prize < 16) {
            //馬鈴薯脆條
            $prize_arr0 = 3;
            $prize_arr1 = 3;
            $prize_arr2 = 3;
        } else if ($prize > 16 && $prize < 19) {
            //瑞士刀USB
            $prize_arr0 = 4;
            $prize_arr1 = 4;
            $prize_arr2 = 4;
        } else if ($prize > 19 && $prize < 33) {
            //Gogoro
            $prize_arr0 = 5;
            $prize_arr1 = 5;
            $prize_arr2 = 5;
        } else {
            //沒中獎的讓拉霸畫面不要出現連線
            if ($prize > 0 && $prize < 3334) {
                $prize_arr0 = 0;
                $prize_arr1 = 1;
                $prize_arr2 = 2;
            } else if ($prize > 3333 && $prize < 6667) {
                $prize_arr0 = 4;
                $prize_arr1 = 5;
                $prize_arr2 = 0;
            } else {
                $prize_arr0 = 3;
                $prize_arr1 = 5;
                $prize_arr2 = 2;
            }
        }

        // $prize_arr = str_split($prize, 1);
        //儲存抽獎的日期


        return view('IWantJoin', ['client_name' => $client_name, 'client_email' => $client_email, 'play_count' => $play_count, 'prize_arr0' => $prize_arr0, 'prize_arr1' => $prize_arr1, 'prize_arr2' => $prize_arr2, 'prize' => $prize]);
    }

    public function store_result(){
        $nowDate = date('Y-m-d');
        $play = new Slot_info([
            'email' => $client_email,
            'name' => $client_name,
            'playdate' => $nowDate,
            'prize' => $prize,
        ]);
        $play->save();
    }

}
