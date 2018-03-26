<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Language
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
        if (!$request->session()->has('locale')) {
            $locale = App::getLocale();

            session(['locale' => $locale]);
            //$request->session()->get('locale', 'default');
        }

        $value = $request->session()->get('locale');


        App::setLocale($value);

        return $next($request);
    }
}
