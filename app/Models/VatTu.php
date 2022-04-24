<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatTu extends Model
{   protected $table='vat_tu';

    protected $fillable=[
        'id',
        'MaVT',
        'TenVT', 
        'DVTinh', 
        'DonGia', 
        'SoLuong',
        'Anh', 
        'MaNSX'
    ];
  
    protected $primaryKey = 'MaVT';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
