<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function Admin()
    {
        return view('page.home');
    }

    public function ProductControl()
    {
        return view('page.products-control');
    }

    public function csLayer1()
    {
        return view('page.cs-layer1');
    }

    public function csLayer2()
    {
        return view('page.cs-layer2');
    }

    public function test()
    {
        return view('page.products-control');
    }
}
