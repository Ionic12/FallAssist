<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    protected $table = 'activity';
    protected $fillable = [
        'majority_prediction',
    ];
    public $timestamps = true;
}