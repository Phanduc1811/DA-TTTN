<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [

        'MaKH', 'MaNV', 'TenNguoiNhan','NgayLapDDH', 'NgayGiaoHang', 'DiaChi','ThanhTien', 'TrangThai'
    ];
    protected $primaryKey = 'MaDDH';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'don_dat_hang';

    protected $rememberTokenName = false;

}
