<?php
namespace App\Controllers;

use App\Models\CommandeModel;
use App\Models\LivraisonModel;

class LivreurCommandeController extends BaseController
{
    public function showCommande()
    {
        $commandeModel = new CommandeModel();
        $data['commandes'] = $commandeModel->where('status', 'En attente')->findAll();
        return view('livreur/showcommande', $data);
    }

    public function prendreCommande($id)
    {
        $commandeModel = new CommandeModel();
        if (!$commandeModel->find($id)) {
            return redirect()->to('/livreur/showCommande')->with('error', 'Commande introuvable.');
        }

        $commandeModel->update($id, ['status' => 'En cours']);
        return redirect()->to('/livreur/takeCommande/' . $id);
    }

    public function ignorerCommande($id)
    {
        return redirect()->to('/livreur/showCommande')->with('message', 'Commande ignorée avec succès.');
    }

    public function takeCommande($id)
    {
        $commandeModel = new CommandeModel();
        $commande = $commandeModel->find($id);

        if (!$commande) {
            return redirect()->to('/livreur/showCommande')->with('error', 'Commande introuvable.');
        }

        $data['commande'] = $commande;
        return view('livreur/takecommande', $data);
    }

    public function markAsLivree($commandeId)
    {
        $livreurId = session()->get('user_id'); // ID du livreur connecté
        if (!$livreurId) {
            return redirect()->to('/login')->with('error', 'Veuillez vous connecter.');
        }

        $commandeModel = new CommandeModel();
        $commande = $commandeModel->find($commandeId);

        if (!$commande) {
            return redirect()->to('/livreur/showcommande')->with('error', 'Commande introuvable.');
        }

        $livraisonModel = new LivraisonModel();

        $livraisonModel->insert([
            'commande_id' => $commandeId,
            'livreur_id' => $livreurId,
            'date_livraison' => date('Y-m-d H:i:s'),
        ]);

        $commandeModel->update($commandeId, ['status' => 'Livrée']);
        return view('/livreur/markaslivred');

    }
}