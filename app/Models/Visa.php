<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    
    protected $table = 'visas';
    protected $fillable = [
        'country','date_from','date_till','image','price','created_at','updated_at'];
    protected $casts = [
        'date_from' => 'datetime',
        'date_till' => 'datetime',
    ];

    public $timestamps = false;

}
