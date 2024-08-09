<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'address',
        'barangay',
        'city',
        'province',
        'latitude',
        'longitude',
        'status',
        'postal_code',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requirement_submissions(){
        return $this->hasMany(RequirementSubmission::class);
    }

    public function images(){
        return $this->hasMany(BoardingHouseImage::class);
    }
    
    public function amenities(){
        return $this->belongsToMany(Amenities::class);
    }

    public function rules(){
        return $this->hasMany(BoardingHouseRules::class);
    }
}
