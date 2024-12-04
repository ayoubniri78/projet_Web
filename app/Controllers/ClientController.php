<?php

namespace App\Controllers;

use App\Models\AdresseModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class ClientController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    // Afficher le formulaire de modification du profil
    public function editProfile()
    {
        // Vérifier si l'utilisateur est connecté
        $userSession = session()->get('user');
        if (!$userSession) {
            return redirect()->to('/login'); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
        }

        $userModel = new UserModel();
        $adresseModel = new AdresseModel();

        // Récupérer les informations de l'utilisateur connecté
        $user = $userModel->find($userSession['id']);
        $adresse = $adresseModel->where('user_id', $user->id)->first();

        // Passer les données à la vue
        return view('client/update_profile', [
            'user' => $user,
            'adresse' => $adresse
        ]);
    }

    // Mise à jour du profil utilisateur
    public function updateProfile()
    {
        // Vérifier si l'utilisateur est connecté
        $userSession = session()->get('user');
        if (!$userSession) {
            return redirect()->to('/login'); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
        }

        $userModel = new UserModel();
        $adresseModel = new AdresseModel();

        // Validation des champs
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|valid_email',
            'adresse' => 'required|min_length[5]|max_length[255]',
            'ville' => 'required|min_length[2]|max_length[100]',
            'code_postal' => 'required|min_length[5]|max_length[20]',
        ];

        if ($this->validate($rules)) {
            // Récupérer l'utilisateur à partir de la session
            $user = $userModel->find($userSession['id']);

            // Mettre à jour les informations de l'utilisateur
            $userModel->update($user->id, [
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'email' => $this->request->getPost('email')
            ]);

            // Mettre à jour l'adresse
            $adresseModel->update($user->id, [
                'adresse' => $this->request->getPost('adresse'),
                'ville' => $this->request->getPost('ville'),
                'code_postal' => $this->request->getPost('code_postal')
            ]);

            // Rediriger avec un message de succès
            session()->setFlashdata('message', 'Profil mis à jour avec succès.');
            return redirect()->to('/client/editProfile');
        } else {
            // Si la validation échoue, renvoyer les erreurs
            return redirect()->to('/client/editProfile')->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
