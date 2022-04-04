<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ds_anh extends Model
{
    use HasFactory;
    protected $table = 'ds_anh';
    protected $primaryKey = 'ma_anh';
    protected $fillable = ['ma_sp','mota_anh','anh'];
    public $timestamps = false;

    public function ds_anh()
    {
        return $this->belongsTo(\App\Models\sanpham::class, 'ma_sp');
    }
}
