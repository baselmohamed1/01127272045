<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
    ];

    protected $with = [
        'platform_css_selector',
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function platform_css_selector()
    {
        return $this->hasMany(PlatformCssSelector::class);
    }


}
