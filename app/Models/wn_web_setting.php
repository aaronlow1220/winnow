<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wn_web_setting extends Model
{
    use HasFactory;

    protected $table = "wn_web_settings";

    protected $fillable = ["uuid", "name", "content"];

    const UPDATED_AT = "modified_at";
}
