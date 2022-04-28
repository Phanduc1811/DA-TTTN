<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDT_NSX extends Model
{
    protected $table = 'sdt_nsx';
    protected $fillable = [
        'id', 'MaNSX', 'SDT',
    ];
    protected $primaryKey = 'MaNSX';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
