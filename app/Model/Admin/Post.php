<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = [
       'post_category_id',
       'post_title_en',
       'post_title_bn',
       'post_image',
       'post_details_en',
       'post_details_bn',
   ];
}
