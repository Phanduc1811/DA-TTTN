<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'TenKH', 'GioiTinh', 'DiaChi','GhiChu'
    ];
    protected $primaryKey = 'MaKH';
    public $incrementing = false;
    protected $keyType = 'string';
 	protected $table = 'khach_hang';
    
    // public function Gallimage(){
    //     $this->hasMany('App\GalleryImage');
    // }
    // public function cate_product(){
    //     return $this->belongsTo('App\CategoryProduct', 'maDanhMuc');
    // }
}
