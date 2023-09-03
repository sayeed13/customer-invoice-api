<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'type',
        'address',
        'city',
        'postal_code'
    ];

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
