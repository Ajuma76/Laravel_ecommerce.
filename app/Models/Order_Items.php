<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_Items extends Model
{
    protected $table = 'order__items';
    protected $fillable = [
        'oder_id',
        'prod_id',
        'qty',
        'price',
    ];

    public function products():BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
