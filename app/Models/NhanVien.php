<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table='nhan_vien';

    protected $fillable=[
        'id',
        'MaNV',
        'TenNV', 
        'NgaySinh', 
        'GioiTinh', 
        'DiaChi', 
    ];
  
    protected $primaryKey = 'MaNV';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
