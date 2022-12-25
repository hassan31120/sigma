<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppCat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function apps(){
        return $this->hasMany(App::class, 'cat_id');
    }

}
