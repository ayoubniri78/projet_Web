<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table      = 'reservations';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'table_id', 'start_time', 'end_time', 'status'];

    
    protected $useTimestamps = true;

    
    
}
