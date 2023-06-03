<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;



    protected $fillable = [
       'name',
    //    'days',
       'price',
       'content_count',
       'server_count',
       'paypal_plan_id',
       'type',
    ];

   //  public function payment()
   //  {
   //      return $this->hasMany(Payment::class);
   //  }
}
