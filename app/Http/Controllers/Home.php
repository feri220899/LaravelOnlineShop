<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function Home() {
        return view('page.home');
    }
    public function Login() {
        return view('page.login');
    }
}
