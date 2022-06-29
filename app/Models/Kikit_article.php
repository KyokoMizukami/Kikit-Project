<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kikit_article extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_title',
        'article_description',
        'area',
        'category',
        'address',
        'user_id',
        'article_img',
      ];
      protected $primaryKey = 'article_id';
}
