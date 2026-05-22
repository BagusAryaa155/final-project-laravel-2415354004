<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        "customer_id",
        "service_id",
        "start_date",
        "end_date",
        "status"
    ];
=======
    protected $fillable = ["customer_id", "service_id", "start_date", "end_date", "status"];
>>>>>>> c55fcc5 (Second 2)

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}