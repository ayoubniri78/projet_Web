<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CommandeModel;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $articleModel = new ArticleModel();
        $commandeModel = new CommandeModel();

        // Récupérer les données nécessaires
        $totalArticles = $articleModel->countAllResults();
        $articlesDisponible = $articleModel->where('stock >', 0)->countAllResults();
        $totalCommandes = $commandeModel->countAllResults();
        $articles = $articleModel->findAll(); // Récupérer tous les articles

        // Passer les données à la vue
        $data = [
            'totalArticles' => $totalArticles,
            'articlesDisponible' => $articlesDisponible,
            'totalCommandes' => $totalCommandes,
            'articles' => $articles, // Inclure la liste des articles
        ];

        return view('admin/dashboard', $data);
    }
}
