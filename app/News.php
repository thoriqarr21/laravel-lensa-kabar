<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'excerpt', 'details', 'image','user_id', 'category_id', 'status', 'featured', 'view_count'];

    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

}
