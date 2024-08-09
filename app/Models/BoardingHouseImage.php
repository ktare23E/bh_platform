<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHouseImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'boarding_house_id',
        'file_path'
    ];

    public function boarding_house(){
        return $this->belongsTo(BoardingHouse::class);
    }   
}
