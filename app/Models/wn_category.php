<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wn_category extends Model
{
    use HasFactory;

    protected $table = "wn_categories";

    protected $fillable= ["uuid", "name", "status"];

    protected $updated_at = "modified_at";
}
