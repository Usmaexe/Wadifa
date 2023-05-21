<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //This Function Allow Us To Filter Jobs by Tags
    public function scopeFilter($query ,array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.request('tag').'%');//this is an sql light query
        }
    }
}
