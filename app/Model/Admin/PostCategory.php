<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = ['post_category_name_en','post_category_name_bn'];
}
