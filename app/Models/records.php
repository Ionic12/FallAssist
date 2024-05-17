<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class records extends Model
{
    protected $primaryKey = 'records_id';
    protected $fillable = [
        'user_id',
        'records',
    ];
    public $timestamps = true;
}
