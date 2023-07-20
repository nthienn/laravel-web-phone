<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tendanhmuc', 'image'
    ];
    protected $primaryKey = 'id_danhmuc';
    protected $table = 'tbl_danhmuc';

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
