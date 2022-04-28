<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'MaKH', 'MaNV', 'NgayLapDDH', 'NgayGiaoHang', 'ThanhTien', 'TrangThai', 'SoLuong'
    ];
    protected $primarykey = 'MaDDH';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'don_dat_hang';
}
