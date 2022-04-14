<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    protected $table='nha_san_xuat';
    protected $fillable=[
        'MaNSX', 'TenNSX', 'DiaChi'
    ];
    protected $primaryKey = 'MaNSX';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}