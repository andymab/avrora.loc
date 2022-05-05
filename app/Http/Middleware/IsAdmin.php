<?php

namespace App\Http\Middleware;
use Auth;;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       if ( Auth::user() &&  Auth::user()->isAdmin()) {
            return $next($request);
       } //прошли проверку идем дальше

       return redirect()->back()->with('success','У Вас нет прав администратора');
       //abort(404);  // for other user throw 404 error
   
    }
}
