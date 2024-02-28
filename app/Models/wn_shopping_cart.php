<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wn_shopping_cart extends Model
{
    use HasFactory;

    protected $table = "wn_shopping_carts";

    protected $fillable = ["uuid", "user_uid", "product_uid", "quantity", "status"];

    protected $hidden = ["id"];

    const UPDATED_AT = "modified_at";
}
