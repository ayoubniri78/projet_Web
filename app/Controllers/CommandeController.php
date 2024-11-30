<?php

namespace App\Controllers;

use App\Models\CommandeModel;
use App\Models\ArticleModel;
use CodeIgniter\Controller;

class CommandeController extends Controller
{
    public function enregistrecommande()
    {
        if (!auth()->loggedIn()) {
            return redirect()->to('/login')->with('error', 'Vous devez être connecté pour passer une commande.');
        }

        // Récupérer l'ID de l'utilisateur et les données du formulaire
        $userId = session()->get('user_id');
        $montantTotal = $this->request->getPost('montant_total');
        $adresse = $this->request->getPost('adresse');
        $ville = $this->request->getPost('ville');
        $codePostal = $this->request->getPost('code_postal');
        $cartIds = $this->request->getPost('cart_ids');
        $cartQuantities = $this->request->getPost('cart_quantities');
        $cartPrices = $this->request->getPost('cart_prices');

        if (empty($montantTotal) || empty($adresse) || empty($ville) || empty($codePostal)) {
            return redirect()->back()->withInput()->with('error', 'Tous les champs sont obligatoires.');
        }

        // Enregistrer la commande
        $commandeModel = new CommandeModel();
        $commandeData = [
            'user_id' => $userId,
            'montant_total' => $montantTotal,
            'adresse' => $adresse,
            'ville' => $ville,
            'code_postal' => $codePostal
        ];

        if ($commandeModel->insert($commandeData)) {
            // Enregistrer les articles commandés
            $articleModel = new ArticleModel();
            $cartIdsArray = explode(',', $cartIds);
            $cartQuantitiesArray = explode(',', $cartQuantities);
            $cartPricesArray = explode(',', $cartPrices);

            foreach ($cartIdsArray as $key => $articleId) {
                $article = $articleModel->find($articleId);
                if ($article) {
                    $articleModel->update($articleId, [
                        'stock' => $article['stock'] - $cartQuantitiesArray[$key] // Réduction du stock
                    ]);
                }
            }

            return redirect()->to('/client/success')->with('success', 'Commande passée avec succès !');
        } else {
            return redirect()->back()->withInput()->with('error', 'Une erreur est survenue lors de l\'enregistrement de votre
            commande.');
        }
    }
    public function success()
    {
        return view('/client/success') ; 
    }

}