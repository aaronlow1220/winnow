<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class wn_user extends Authenticatable
{
    use HasFactory;

    protected $table = "wn_users";

    protected $fillable = ["uuid", "username", "email", "password"];

    protected $updated_at = "modified_at";
}
