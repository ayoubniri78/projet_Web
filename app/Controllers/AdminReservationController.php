<?php

namespace App\Controllers;

use App\Models\ReservationModel;

class AdminReservationController extends BaseController
{
    // Afficher le calendrier des réservations
    public function showCalendar()
    {
        return view('admin/reservation/calendar');
    }

    // Récupérer les événements pour FullCalendar
    public function getCalendarEvents()
    {
        $reservationModel = new ReservationModel();
        $reservations = $reservationModel->findAll();

        $events = [];
        foreach ($reservations as $reservation) {
            $events[] = [
                'title' => 'Réservation par ' . $reservation['client_name'],
                'start' => $reservation['start_time'],
                'end' => $reservation['end_time'],
                'id' => $reservation['id'],
            ];
        }

        return $this->response->setJSON($events);
    }

    // Annuler une réservation
    public function cancelReservation($id)
    {
        $reservationModel = new ReservationModel();
        $reservationModel->update($id, ['status' => 'annulée']);
        return redirect()->to('/admin/reservation/showCalendar');
    }
}
