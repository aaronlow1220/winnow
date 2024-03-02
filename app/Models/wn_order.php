<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wn_order extends Model
{
    use HasFactory;

    protected $table = "wn_orders";

    protected $fillable = ["uuid","user_uid", "total", "delivery_address", "delivery_method", "payment_account", "status"];

    const UPDATED_AT = "modified_at";
}
