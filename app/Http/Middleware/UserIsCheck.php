<?php

namespace App\Http\Middleware;

use Closure;

class UserIsCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $email_status = $request->session()->get('email_status');
        //判斷是否進行過Email驗證過身分
        if ($email_status != 'success') {
            return redirect('/LoginEmail')->with('message', '請先登入才能夠玩糞GAME歐!!');
        } else {
            return $next($request);
        }
    }
}
