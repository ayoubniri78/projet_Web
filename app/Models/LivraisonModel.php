<?php

namespace App\Models;

use CodeIgniter\Model;

class LivraisonModel extends Model
{
    protected $table = 'livraisons';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'commande_id',
        'livreur_id',
        'date_livraison',
    ];

    protected $useTimestamps = false;
}
