<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Carbon\Carbon;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $guards = empty($guards) ? [null] : $guards;

        if(Auth::check()){
            $expireTime = Carbon::now()->addSeconds(30);
            Cache::put('user-is-online'. Auth::user()->id,true,$expireTime);
            User::where('id',Auth::user()->id)->update([
                'last_seen' => Carbon::now()
            ]);
        }


         if ($request->user()->role !== $role){
            if($request->user()->role == 'vendor')
             return redirect('vendor/dashboard');
             if($request->user()->role == 'admin')
             return redirect('admin/dashboard');
             if($request->user()->role == 'user')
             return redirect('dashboard');
        }

        return $next($request);
    }
}
