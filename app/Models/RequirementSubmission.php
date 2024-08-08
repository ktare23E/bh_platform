<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementSubmission extends Model
{
    use HasFactory;
    protected $fillable = ['boarding_house_id', 'requirement_id', 'status','submitted_at','file_path'];

    public function boardingHouse(){
        return $this->belongsTo(BoardingHouse::class);
    }

    public function requirement(){
        return $this->belongsTo(Requirement::class);
    }
}
