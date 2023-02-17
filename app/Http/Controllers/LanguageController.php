<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function setLocale($language)
    {
        if (in_array($language, config('app.locales'))) {
            session()->put('lang', $language);
        }

        return redirect()->back();
    }
}
