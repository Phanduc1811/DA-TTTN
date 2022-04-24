<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuThu extends Model
{
    protected $table='phieuthu';
    protected $fillable=[
        'id','MaPT', 'NgayTT', 'SoTienTT', 'Dot', 'TrangThai', 'MaNV', 'MaHD', 'CongNo'
    ];
    protected $primaryKey = 'MaPT';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
