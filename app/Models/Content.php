<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Platform;
use App\Models\Server;


class Content extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'platform_id',
    'server_id',
    'content_name',
    'url',
    'folder_path',
    'media_type',
	'download_type'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function platform()
  {
    return $this->belongsTo(Platform::class);
  }
  public function server()
  {
    return $this->belongsTo(Server::class);
  }
}
