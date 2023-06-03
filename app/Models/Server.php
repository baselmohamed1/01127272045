<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [        
        'user_id',
        'server_name',
        'ssh_user_name',
        'ssh_host_name',        
        'ssh_password',
    ];
    protected $guarded = [];
    public function user()
	{
	  return $this->belongsTo(User::class);
  	}
}
