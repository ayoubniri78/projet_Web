<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Libraries\UploadHandler;

class Article extends BaseController
{
    public function listeArticle()
    {
        // Créer une instance du modèle ArticleModel
        $article = new ArticleModel();

        // Récupérer tous les articles depuis la base de données
        $data['article'] = $article->findAll();

        // Charger la vue 'admin/article' et passer les articles
        return view('admin/article', $data);
    }

    public function ajouterArticle()
    {
        // Charger la vue 'admin/ajouterarticle'
        return view('admin/ajouterarticle');
    }

    public function enregistre()
    {
        $article = new ArticleModel();

        $data = [
            'nom' => $this->request->getPost('articleName'),
            'description' => $this->request->getPost('articleDescription'),
            'prix' => $this->request->getPost('articlePrice'),
            'stock' => $this->request->getPost('articleStock'),
        ];

        // Récupérer le fichier téléchargé
        $file = $this->request->getFile('articleImage');

        // Utiliser UploadHandler pour gérer l'upload
        $uploadHandler = new UploadHandler();

        try {
            // Tenter d'upload l'image
            $newImageName = $uploadHandler->uploadFile($file);

            // Ajouter le nom de l'image dans les données à insérer dans la base
            $data['image'] = $newImageName;

            // Enregistrer l'article avec l'image dans la base de données
            $article->save($data);
            return redirect()->to('/admin/listeArticle')->with('status', 'Article ajouté avec succès');
        } catch (\RuntimeException $e) {
            // En cas d'erreur, afficher un message
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function editer($id)
    {
        // Créer une instance du modèle ArticleModel
        $article = new ArticleModel();

        // Trouver l'article à éditer par son ID
        $data['article'] = $article->find($id);

        // Charger la vue 'admin/editer' avec les données de l'article
        return view('admin/editer', $data);
    }

    public function update($id)
    {
        // Créer une instance du modèle ArticleModel
        $article = new ArticleModel();

        // Récupérer les données du formulaire
        $data = [
            'nom' => $this->request->getPost('articleName'),
            'description' => $this->request->getPost('articleDescription'),
            'prix' => $this->request->getPost('articlePrice'),
            'stock' => $this->request->getPost('articleStock'),
        ];

        // Vérifier s'il y a une nouvelle image téléchargée
        $file = $this->request->getFile('articleImage');

        // Utiliser UploadHandler pour gérer l'upload
        $uploadHandler = new UploadHandler();

        try {
            // Si une nouvelle image a été téléchargée
            if ($file->isValid() && !$file->hasMoved()) {
                // Tenter d'upload l'image
                $newImageName = $uploadHandler->uploadFile($file);

                // Ajouter le nom du fichier dans les données à insérer dans la base
                $data['image'] = $newImageName;
            }

            // Mettre à jour les données de l'article dans la base de données
            $article->update($id, $data);

            // Rediriger avec un message de succès
            return redirect()->to('/admin/listeArticle')->with('status', 'Article modifié avec succès');
        } catch (\RuntimeException $e) {
            // Si une erreur se produit lors de l'upload
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function supprimer($id)
    {
        // Créer une instance du modèle ArticleModel
        $article = new ArticleModel();

        // Supprimer l'article de la base de données
        $article->delete($id);

        // Rediriger avec un message de succès
        return redirect()->to('/admin/listeArticle')->with('status', 'Article supprimé avec succès');
    }
    public function detail($id)
    {
        // Charger le modèle
        $articleModel = new ArticleModel();

        // Récupérer l'article par son ID
        $article = $articleModel->find($id);

        // Vérifier si l'article existe
        if (!$article) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Article introuvable');
        }

        // Passer l'article à la vue
        return view('/client/detail', ['article' => $article]);
    }
}
