<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHouseRules extends Model
{
    use HasFactory;
    protected $fillable = [
        'boarding_house_id',
        'rule'
    ];

    public function boarding_house(){
        return $this->belongsTo(BoardingHouse::class);
    }
}
