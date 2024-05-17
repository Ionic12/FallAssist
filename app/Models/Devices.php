<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;
    protected $primaryKey = 'devices_id';
    protected $fillable = [
        'setStatus',
        'mac',
    ];
}
