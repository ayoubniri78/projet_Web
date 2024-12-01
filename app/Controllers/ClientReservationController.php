<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\TableModel;

class ClientReservationController extends BaseController
{
    // Afficher la page de réservation
    public function showReservationForm()
    {
        $tableModel = new TableModel();
        $data['tables'] = $tableModel->findAll();
        return view('client/reservation/form', $data);
    }

    // Enregistrer la réservation du client
    public function makeReservation()
    {
        $reservationModel = new ReservationModel();

        $data = [
            'client_name' => $this->request->getPost('client_name'),
            'client_phone' => $this->request->getPost('client_phone'),
            'table_id' => $this->request->getPost('table_id'),
            'start_time' => $this->request->getPost('start_time'),
            'end_time' => $this->request->getPost('end_time'),
            'status' => 'confirmée',  // Par défaut la réservation est confirmée
        ];

        $reservationModel->save($data);
        return redirect()->to('/client/reservation/showReservationForm')->with('status', 'Réservation effectuée avec succès');
    }
}
