<?php
namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nom',
        'description',
        'prix',
        'image',
        'stock',
    ];

}

