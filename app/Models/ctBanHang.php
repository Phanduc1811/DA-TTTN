<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ctBanHang extends Model
{
    protected $fillable = [
        'SoLuong'
    ];
    protected $primarykey = 'MaDDH, MaVT';
    protected $table = 'ct_ban_hang';
}
