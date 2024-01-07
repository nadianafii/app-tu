<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    //  pastiin rolenya udah sesuai
    // ini fungsinya, nanti si auth ngecek itu akun kalian role nya apa. kalo iya, dia masuk ke dashboard, kalo ngga, dia masuk ke error.permission dimana itu isinya tuh kayak "kalian ngga ada izin buat ke web ini" gitu
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == "guru") {
            return $next($request);
        } else {
            return redirect()->route('error.permission');
        }
    }
}