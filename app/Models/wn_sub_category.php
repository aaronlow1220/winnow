<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wn_sub_category extends Model
{
    use HasFactory;

    protected $table = "wn_sub_categories";

    protected $fillable= ["uuid", "category_uid", "name", "alias", "status"];

    protected $updated_at = "modified_at";
}
