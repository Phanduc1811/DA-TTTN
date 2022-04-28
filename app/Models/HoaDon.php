<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table='hoadon';
    protected $fillable=[
        'id','MaHD', 'MaKH', 'MaDDH', 'ThanhTien', 'VAT', 'NgayNhanHang'
    ];
    protected $primaryKey = 'MaHD';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
