<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tensanpham', 'hinhanh', 'giasanpham', 'soluong', 'diadiem', 'noidung', 'id_danhmuc', 'id_taikhoan'
    ];
    protected $primaryKey = 'id_sanpham';
    protected $table = 'tbl_sanpham';

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id_danhmuc', 'id_sanpham');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Images');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_taikhoan', 'id_sanpham');
    }
}
