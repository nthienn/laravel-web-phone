<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_sanpham', 'hinhanh'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_thuvienanh';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_sanpham', 'id');
    }
}
