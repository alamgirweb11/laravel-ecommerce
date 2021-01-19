<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wish_lists';
    protected $fillable = [
          'user_id',
          'product_id',
    ];
}
