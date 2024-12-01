<?php

namespace App\Controllers;

use App\Models\CommandeModel;

class AdminCommandeController extends BaseController
{
    protected $commandeModel;

    public function __construct()
    {
        $this->commandeModel = new CommandeModel();
    }

    // Affiche la liste des commandes
    public function index()
    {
        $data = [
            'commandes' => $this->commandeModel->findAll()
        ];

        return view('admin/commandes', $data);
    }

    // Marque une commande comme livrée
    public function markAsDelivered($id)
    {
        $commande = $this->commandeModel->find($id);

        if ($commande) {
            $this->commandeModel->update($id, ['status' => 'Livrée']);
            return redirect()->to('/admin/commandes')->with('message', 'Commande marquée comme livrée.');
        }

        return redirect()->to('/admin/commandes')->with('error', 'Commande non trouvée.');
    }

    // Supprime une commande
    public function delete($id)
    {
        $commande = $this->commandeModel->find($id);

        if ($commande) {
            $this->commandeModel->delete($id);
            return redirect()->to('/admin/commandes')->with('message', 'Commande supprimée.');
        }

        return redirect()->to('/admin/commandes')->with('error', 'Commande non trouvée.');
    }
}
