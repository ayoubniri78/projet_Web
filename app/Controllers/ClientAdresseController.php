<?php

namespace App\Controllers;

use App\Models\AdresseModel;
use CodeIgniter\Controller;

class ClientAdresseController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    // Afficher le formulaire de modification de l'adresse et du numéro de téléphone
    public function editAddress()
    {
        // Vérifier si l'utilisateur est connecté
        if (!auth()->loggedIn()) {
            return redirect()->to('/login')->with('error', 'Vous devez être connecté pour modifier votre adresse.');
        }

        // Récupérer l'ID de l'utilisateur depuis la session
        $userId = session()->get('user_id');
        if (empty($userId)) {
            // return redirect()->back()->with('error', 'Vous devez être connecté pour modifier votre adresse.');
            return view('welcome_message');
        }

        // Récupérer l'adresse actuelle de l'utilisateur
        $adresseModel = new AdresseModel();
        $adresse = $adresseModel->where('user_id', $userId)->first();

        // Afficher le formulaire de modification avec les données actuelles
        return view('client/edit_address', [
            'adresse' => $adresse
        ]);
    }

    // Mettre à jour l'adresse et le numéro de téléphone de l'utilisateur
    public function updateAddress()
    {
        // Vérifier si l'utilisateur est connecté
        if (!auth()->loggedIn()) {
            return redirect()->to('/login')->with('error', 'Vous devez être connecté pour mettre à jour votre adresse.');
        }

        // Récupérer l'ID de l'utilisateur depuis la session
        $userId = session()->get('user_id');
        if (empty($userId)) {
            return redirect()->back()->with('error', 'Vous devez être connecté pour mettre à jour votre adresse.');
        }

        // Règles de validation
        $rules = [
            'adresse' => 'required|min_length[5]|max_length[255]',
            'ville' => 'required|min_length[2]|max_length[100]',
            'code_postal' => 'required|min_length[5]|max_length[20]',
            'numero_telephone' => 'required|regex_match[/^\+?[0-9]{10,15}$/]',
        ];

        // Si la validation échoue
        if (!$this->validate($rules)) {
            return redirect()->to('/client/editAddress')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Récupérer les nouvelles données d'adresse
        $adresseData = [
            'adresse' => $this->request->getPost('adresse'),
            'ville' => $this->request->getPost('ville'),
            'code_postal' => $this->request->getPost('code_postal'),
            'numero_telephone' => $this->request->getPost('numero_telephone')
        ];

        // Mise à jour de l'adresse
        $adresseModel = new AdresseModel();
        $existingAdresse = $adresseModel->where('user_id', $userId)->first();

        if ($existingAdresse) {
            // Si une adresse existe déjà, la mettre à jour
            $adresseModel->update($existingAdresse['id'], $adresseData);
        } else {
            // Sinon, créer une nouvelle adresse
            $adresseData['user_id'] = $userId;
            $adresseModel->insert($adresseData);
        }

        // Rediriger avec un message de succès
        return redirect()->to('/client/editAddress')->with('success', 'Adresse et numéro de téléphone mis à jour avec succès.');
    }
}
