<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'TenKH', 'GioiTinh', 'Username', 'Password','DiaChi','GhiChu'
    ];
    protected $primaryKey = 'MaKH';
    public $incrementing = false;
    protected $keyType = 'string';
 	protected $table = 'khach_hang';
    protected $guard = 'user';
    protected $rememberTokenName = false;

    public function getAuthPassword(){
        return $this->Password;
    }
}
