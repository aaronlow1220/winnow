<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wn_order_item extends Model
{
    use HasFactory;

    protected $table = "wn_order_items";

    protected $fillable = ["uuid", "order_uid", "product_uid", "quantity", "status"];

    const UPDATED_AT = "modified_at";
}
