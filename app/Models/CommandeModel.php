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
    ];

    // Désactiver les timestamps, car la table ne contient pas de colonnes `created_at` et `updated_at`
    protected $useTimestamps = false;
}
