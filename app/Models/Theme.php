<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model {

    use HasFactory;

    public function articles() {
        return $this->hasMany(Article::class);
    }

    protected $fillable = [
        'name'
    ];

}
