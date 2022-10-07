<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product() : BelongsTo
    {
        return $this->belongsTo(ProductService::class , 'product_service_id');
    }
    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class , 'customer_id');
    }
    public function driver() : BelongsTo
    {
        return $this->belongsTo(Driver::class , 'driver_id');
    }

    public function getTotal()
    {
        return  (double)$this->quantity * (double)$this->rate;
    }
}
