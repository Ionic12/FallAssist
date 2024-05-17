<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'username',
        'idchat',
    ];
    public $timestamps = true;
}
