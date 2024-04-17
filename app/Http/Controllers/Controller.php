<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function welcome()
    {
        return view('public.pages.welcome', [
            'title' => 'Selamat Sub'
        ]);
    }
}
