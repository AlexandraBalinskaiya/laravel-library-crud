<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function switch($locale)
    {
        Session::put('locale', $locale);
        App::setLocale($locale);

        return redirect()->back();
    }
}
