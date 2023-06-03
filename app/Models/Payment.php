<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;

    protected $casts = [
        'next_billing_time' => 'datetime:Y-m-d',
    ];
    
    protected $fillable = [
        'user_id',
        'status',
        'subscription_id',
        'package_id',
        'payer_id',
        'next_billing_time',        
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
