<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wn_product extends Model
{
    use HasFactory;

    protected $table = "wn_products";

    protected $fillable= ["uuid", "name", "description", "price", "vendor", "cover_image", "images", "amount", "allowed_delivery_method", "is_halal", "purchase_count", "status"];

    const UPDATED_AT = "modified_at";
}
