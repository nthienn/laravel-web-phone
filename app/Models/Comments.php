<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_taikhoan', 'id_sanpham', 'noidung', 'ngaydg'
    ];
    protected $primaryKey = 'id_danhgia';
    protected $table = 'tbl_danhgia';

    public function product()
    {
        return $this->belongsTo('App\Models\Category', 'id_sanpham', 'id_danhgia');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_taikhoan', 'id_danhgia');
    }
}
