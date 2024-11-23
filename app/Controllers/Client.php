<?php

namespace App\Controllers;
use App\Models\ArticleModel ;

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
        $article = new ArticleModel();
        $data['article'] = $article->findAll();
        return view('client/menu',$data);
    }
    public function panier()
    {
        return view('client/panier');
    }
}
