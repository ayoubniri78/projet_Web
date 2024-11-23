<?php

namespace App\Controllers;

class Client extends BaseController
{
    public function index()
    {
        return view('client/index');
    }
    public function about()
    {
        return view('client/about');
    }
    public function contact()
    {
        return view('client/contact');
    }
    public function menu()
    {
        return view('client/menu');
    }
    public function panier()
    {
        return view('client/panier');
    }
}
