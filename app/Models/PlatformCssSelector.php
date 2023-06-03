<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Platform;

class PlatformCssSelector extends Model
{
  use HasFactory;

  protected $fillable = [
    'platform_id',
    'css_selector',
    'media_type',
  ];


  public function platform()
  {
    return $this->belongsTo(Platform::class);
  }



}
