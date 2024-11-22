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
        $data = [
            'nom' => $this->request->getPost('articleName'),
            'description' => $this->request->getPost('articleDescription'),
            'prix' => $this->request->getPost('articlePrice'),
        ];
        $article->save($data);
        return redirect()->to('/admin/listeArticle')->with('status', 'Article ajouter avec succes');
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