<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaDomain extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
        'old_domain',     
        'new_domain',     
        
    ];

}
