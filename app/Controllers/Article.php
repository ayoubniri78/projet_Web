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

            // Envoyer un email aux utilisateurs
            $this->envoyerEmails($data);

            return redirect()->to('/admin/listeArticle')->with('status', 'Article ajouté avec succès');
        } catch (\RuntimeException $e) {
            // En cas d'erreur, afficher un message
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Méthode pour envoyer un email à tous les utilisateurs
     */
    /**
     * Méthode pour envoyer un email à tous les utilisateurs
     */
    private function envoyerEmails($article)
    {
        // Charger le modèle UserModel ou faire une requête directe
        $db = \Config\Database::connect();
        $builder = $db->table('auth_identities');
        $users = $builder->select('secret')->where('type', 'email_password')->get()->getResult();

        $email = \Config\Services::email();

        foreach ($users as $user) {
            $email->clear();
            $email->setTo($user->secret);
            $email->setSubject('Découvrez notre nouveau produit : ' . $article['nom']);

            // Contenu HTML professionnel
            $message = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                }
                .header {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px;
                    text-align: center;
                }
                .content {
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    background-color: #f9f9f9;
                }
                .footer {
                    text-align: center;
                    font-size: 12px;
                    color: #777;
                    margin-top: 20px;
                }
                .btn {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #4CAF50;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    margin-top: 20px;
                }
                .btn:hover {
                    background-color: #45a049;
                }
            </style>
        </head>
        <body>
            <div class='header'>
                <h1>Nouveau Produit Disponible !</h1>
            </div>
            <div class='content'>
                <p>Bonjour,</p>
                <p>Nous sommes ravis de vous annoncer l'arrivée d'un nouveau produit dans notre boutique :</p>
                <ul>
                    <li><strong>Nom :</strong> {$article['nom']}</li>
                    <li><strong>Description :</strong> {$article['description']}</li>
                    <li><strong>Prix :</strong> {$article['prix']} €</li>
                </ul>
                <p>Ne manquez pas l'occasion de découvrir ce produit exceptionnel !</p>
                <a class='btn' href='resto.loc/client/menu'>Voir le produit</a>
            </div>
            <div class='footer'>
                <p>Merci pour votre confiance.</p>
                <p>L'équipe de Votre Boutique</p>
                <p><small>Ce message a été envoyé automatiquement. Veuillez ne pas répondre à cet email.</small></p>
            </div>
        </body>
        </html>";

            // Ajouter le contenu HTML dans l'email
            $email->setMessage($message);
            $email->setMailType('html'); // Spécifie que l'email est en HTML

            $email->send();
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
