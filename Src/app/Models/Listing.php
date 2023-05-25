<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    
    //This array allow us to actually save the data to the DB
  //|   // protected $fillable = ['title','company','location','email','website','tags','description'];
  //|_____________________________________________________________________________________________________   
    
    //This Function Allow Us To Filter Jobs by Tags
    public function scopeFilter($query ,array $filters){
        if($filters['tag'] ?? false){
            //this is an sql light query
            $query->where('tags','like','%'.request('tag').'%');
        }
        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')
                ->orWhere('description','like','%'.request('search').'%')
                ->orWhere('tags','like','%'.request('search').'%')
                ->orWhere('location','like','%'.request('search').'%');
            ;
        }
    }
}
