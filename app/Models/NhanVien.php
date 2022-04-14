<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NhanVien extends Authenticatable
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'TenNV', 'NgaySinh', 'GioiTinh', 'DiaChi','Quyen','Email','Username','Password'
    ];

    protected $primaryKey = 'MaNV';
    protected $table = 'nhan_vien';
    protected $guard = 'admin';
    protected $keyType = 'string';

    protected $rememberTokenName = false;

    public function getAuthPassword(){
        return $this->Password;
    }
}
