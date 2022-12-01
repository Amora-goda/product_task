<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variant extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class,'variants_atrributes')
        ->withPivot(['value'])
        ->as('options');
    }
}
