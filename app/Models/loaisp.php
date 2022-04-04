<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisp extends Model
{
    use HasFactory;
    protected $table = 'loai_sp';
    protected $primaryKey = 'ma_loai';
    protected $fillable = ['ten_loai','anhien'];
    public $timestamps = false;
}
