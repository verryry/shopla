<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
      'id_category',
      'name',
      'price',
      'featured_image',
      'size',
      'quantity',
      'description',
  ];

  public function category()
  {
    return $this->belongsTo('App\Models\Category','id_category','id');
  }
}
