<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id', 'id')
        ->withDefault([
            'name' => '-'
        ]);
    }
    public function variants()
    {
      return $this->hasMany(Variant::class);
    }
}
