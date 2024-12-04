<?php
namespace App\Controllers;
use App\Models\AdresseModel;
use App\Models\ArticleModel;

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
        // Récupérer l'ID de l'utilisateur connecté
        $userId = session()->get('user_id');
        
        // Si l'utilisateur n'est pas connecté, rediriger vers la page de login
        if (empty($userId)) {
            return redirect()->to('/login')->with('error', 'Vous devez être connecté pour voir votre panier.');
        }

        // Récupérer l'adresse de l'utilisateur
        $adresseModel = new AdresseModel();
        $adresse = $adresseModel->where('user_id', $userId)->first();

        // Passer les données de l'adresse à la vue
        return view('client/panier', [
            'adresse' => $adresse
        ]);
    }
}
