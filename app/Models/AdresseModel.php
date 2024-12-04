<?php

namespace App\Models;

use CodeIgniter\Model;

class AdresseModel extends Model
{
    protected $table      = 'adresses';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'adresse', 'ville', 'code_postal', 'numero_telephone'];
    protected $useTimestamps = true;

    // Règles de validation pour l'adresse
    protected $validationRules = [
        'adresse'         => 'required|min_length[5]|max_length[255]',
        'ville'           => 'required|min_length[2]|max_length[100]',
        'code_postal'     => 'required|min_length[5]|max_length[20]',
        'numero_telephone'=> 'required|regex_match[/^\+?[0-9]{10,15}$/]',
    ];

    protected $validationMessages = [
        'adresse' => [
            'required' => 'L\'adresse est obligatoire.',
            'min_length' => 'L\'adresse doit contenir au moins 5 caractères.',
        ],
        'ville' => [
            'required' => 'La ville est obligatoire.',
            'min_length' => 'Le nom de la ville doit contenir au moins 2 caractères.',
        ],
        'code_postal' => [
            'required' => 'Le code postal est obligatoire.',
            'min_length' => 'Le code postal doit contenir au moins 5 caractères.',
        ],
        'numero_telephone' => [
            'required' => 'Le numéro de téléphone est obligatoire.',
            'regex_match' => 'Le numéro de téléphone doit être valide (10 à 15 chiffres).',
        ]
    ];
}
