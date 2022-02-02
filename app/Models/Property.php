<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'address', 'bedrooms', 'bathrooms', 'image', 'category_id'];

    public function category() {
      // one-to-one relationship. A property is associated with one category
      // hasOne(Category::class, 'foreign_key', 'local_key')
      // id of categories table (1, for House) (foreign key)
      // category_id of properties table (1) (local key)
      return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
