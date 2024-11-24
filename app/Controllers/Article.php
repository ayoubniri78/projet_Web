<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class Article extends BaseController
{
    public function listeArticle()
    {
        $article = new ArticleModel();
        $data['article'] = $article->findAll();
        return view('admin/article', $data);
    }
    public function ajouterArticle()
    {
        return view('admin/ajouterarticle');
    }

    public function enregistre()
    {
        $article = new ArticleModel();
        $file = $this->request->getFile('articleImage');

        // Vérifier si le fichier est valide
        if ($file && $file->isValid()) {
            // Générer un nom aléatoire pour l'image
            $imageName = $file->getRandomName();

            // Déplacer le fichier vers le dossier 'uploads/'
            $file->move('uploads', $imageName);
        } else {
            // Gérer l'erreur si le fichier est invalide
            return redirect()->back()->with('error', 'Erreur lors de l\'upload de l\'image. Veuillez réessayer.');
        }

        // Créer les données pour l'article
        $data = [
            'nom' => $this->request->getPost('articleName'),
            'description' => $this->request->getPost('articleDescription'),
            'prix' => $this->request->getPost('articlePrice'),
            'image' => isset($imageName) ? $imageName : null, // Assurez-vous que l'image est définie
        ];

        // Enregistrer les données dans la base
        if ($article->save($data)) {
            return redirect()->to('/admin/listeArticle')->with('status', 'Article ajouté avec succès');
        } else {
            // Gestion des erreurs d'enregistrement
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout de l\'article. Veuillez réessayer.');
        }
    }

    public function editer($id)
    {
        $article = new ArticleModel();
        $data['atricle'] = $article->find($id);
        return view('admin/editer', $data);
    }
    public function update($id)
    {
        $article = new ArticleModel();

        $data = [
            'nom' => $this->request->getPost('articleName'),
            'description' => $this->request->getPost('articleDescription'),
            'prix' => $this->request->getPost('articlePrice'),
        ];
        $article->update($id, $data);
        return redirect()->to('/admin/listeArticle')->with('status', 'Article modifier avec succes');
    }
    public function supprimer($id)
    {
        $article = new ArticleModel();
        $article->delete($id);
        return redirect()->to('/admin/listeArticle')->with('status', 'Article supprimer avec succes');
    }
}