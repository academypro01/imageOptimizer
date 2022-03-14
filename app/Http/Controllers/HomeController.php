<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function changeLanguage()
    {
        $locale = (app()->getLocale() == 'en') ? 'fa' : 'en';
        if(Session::has('language')) {
            Session::remove('language');
        }
        Session::put('language', $locale);
        return redirect()->back();
    }
}
