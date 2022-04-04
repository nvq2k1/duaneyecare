<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;
    protected $table = 'tuy_bien_banner';
    protected $primaryKey = 'id';
    protected $fillable = ['anh_banner','trang_thai'];
    public $timestamps = false;
}
