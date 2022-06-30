<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $current = $request->segment(1);
        
        if ($current != 'admin') {
            if (in_array($current, config('voyager.multilingual.locales'))) {
                $locale = $current;
            } else {
                $locale = session()->has('locale') ? session()->get('locale') : config('voyager.multilingual.default');
                app()->setLocale($locale);
                URL::defaults(['locale' => $locale]);
                session()->put('locale', $locale);
                $segments = $request->segments();
                $segments = \Arr::prepend($segments, $locale);

                return redirect()->to(implode('/', $segments));
            }
            session()->put('locale', $locale);
            app()->setLocale($locale);
            \Carbon\Carbon::setLocale($locale);

            URL::defaults(['locale' => $locale]);
        }
        
        return $next($request);
    }
}
