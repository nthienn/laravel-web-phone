<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'email', 'password', 'name', 'phone', 'address'
    ];
    protected $primaryKey = 'id_admin';
    protected $table = 'tbl_admin';
}
