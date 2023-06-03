<?php

namespace App\Models;
use App\Models\Server;
use App\Models\Content;
use App\Models\Payment;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'payment_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->with('package')->where('status', 'ACTIVE');
    }

    public function canAccessFilament(): bool
    {
        return $this->hasRole('admin');
    }

    public function availableServerCount()
    {
        $server_count = 0;
        $payments = $this->payments()->get();

        foreach ($payments as $payment) {
            $package = $payment->package;
            $server_count += $package->server_count;
        }

        return $server_count;
    }

    public function availableContentCount()
    {
        $content_count = 0;
        $payments = $this->payments()->get();

        foreach ($payments as $payment) {
            $package = $payment->package;
            $content_count += $package->content_count;
        }

        return $content_count;
    }

    public function getBasePlanExpiryDate()
    {
        $base_plan = $this->hasMany(Payment::class)
            ->with('package')
            ->where('status', 'ACTIVE')
            ->whereHas('package', function($q){
                $q->where('type', '=', 'subscription');
            })->first();

        if(!$base_plan)
        {
            return 'Not subscribed';
        }
        return $base_plan->toArray()['next_billing_time'];
    }

    public function hasAnyBasePlan()
    {
        $base_plan = $this->hasMany(Payment::class)
            ->with('package')
            ->where('status', 'ACTIVE')
            ->whereHas('package', function($q){
                $q->where('type', '=', 'subscription');
            })->first();

        if(!$base_plan)
        {
            return false;
        }

        return true;
    }
}
