<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categori', 'id');
    }
}
