<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceList extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class , 'customer_id');
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(ProductService::class , 'product_service_id');
    }
}
