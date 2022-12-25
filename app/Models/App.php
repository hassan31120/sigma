<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images(){
        return $this->hasMany(AppImage::class, 'app_id');
    }

    public function cat(){
        return $this->belongsTo(AppCat::class, 'cat_id');
    }
}
