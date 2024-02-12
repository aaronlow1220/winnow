<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wn_post extends Model
{
    use HasFactory;

    protected $table = "wn_posts";

    protected $fillable= ["uuid", "admin_uid", "alias", "category_uid", "sub_category_uid", "title", "content", "media_location", "hits", "status"];

    const UPDATED_AT = "modified_at";
}
