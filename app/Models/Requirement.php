<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'status'];

    public function requirementSubmissions(){
        return $this->hasMany(RequirementSubmission::class);
    }
}
