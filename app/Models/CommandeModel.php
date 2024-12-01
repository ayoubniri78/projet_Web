<?php

namespace App\Models;

use CodeIgniter\Model;

class CommandeModel extends Model
{
    protected $table = 'commandes';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'adresse',
        'ville',
        'code_postal',
        'montant_total',
        'status', // Ajout du champ 'status' si nécessaire
    ];

    protected $useTimestamps = false;
}
