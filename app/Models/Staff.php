<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'TenNV', 'NgaySinh', 'GioiTinh','DiaChi', 'user_name', 'password'
    ];
    protected $primaryKey = 'MaNV';
    public $incrementing = false;
    protected $keyType = 'string';
 	protected $table = 'nhan_vien';
}
