<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'title',
    //     'slug',
    // ];

    public function projects(){
        return $this ->hasMany(Project::class);
    }
}
