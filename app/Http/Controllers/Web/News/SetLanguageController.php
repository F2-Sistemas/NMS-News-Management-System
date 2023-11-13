<?php

namespace App\Http\Controllers\Web\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SetLanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\LanguageMiddleware::class)->except([
            '__invoke',
            '__setLang',
        ]);
    }

    public function __invoke(Request $request, $lang = null)
    {
        static::setLang($request, $lang);

        return redirect()->route('home');
    }

    public static function setLang(Request &$request, $lang = null): string
    {
        $sessionLang = session()->get('lang');
        $lang = ($lang ?: $request->get('lang')) ?: $sessionLang;
        $lang = in_array($lang, Arr::wrap(config('app.avaliable_locales'))) ? $lang : 'en';
        $request->session()->put(['lang' => $lang]);

        return $lang;
    }
}
