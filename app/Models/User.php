<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use RTippin\Messenger\Contracts\MessengerProvider;
use RTippin\Messenger\Traits\Messageable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Cashier\Billable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable implements MessengerProvider

{

    use HasFactory, Notifiable, HasApiTokens, Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use Sluggable;
    use Messageable;
    use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'dob',
        'gender',
        'availability',
        'phone',
        'wallet',
        'user_status',
        'profile_image',
        'city',
        'state',
        'discription',
        'password',
        'status',
        'country',
        'deleted_at',
        'password',
        'loginphone',
        'bbphone',
        'call_id'
    ];

    protected $dates = [

        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

  
    public function getProfileImageAttribute($value)
    {
        return $value ?? 'user.png';
    }
    public static function getProviderSettings(): array
    {
        return [
            'alias' => 'user',
            'searchable' => true,
            'friendable' => true,
            'devices' => true,
            'default_avatar' => url('messenger-chat/messenger/images/users.png'),
            'cant_message_first' => [],
            'cant_search' => [],
            'cant_friend' => [],
        ];
    }
    public static function getProviderSearchableBuilder(Builder $query, string $search, array $searchItems)
    {
        
        $query->where(function (Builder $query) use ($searchItems) {
            foreach ($searchItems as $item) {
                $query->orWhere('first_name', 'LIKE', "%{$item}%")
                    ->orWhere('last_name', 'LIKE', "%{$item}%");
            }
        })->orWhere('email', '=', $search);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'first_name'
            ]
        ];
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function Models()
    {
        return $this->hasOne('App\Models\Models');
    }
    public function withdrow()
    {
        return $this->belongsToMany(Withdrow::class, 'vendor_id');

    }
    public function coupn()
    {
        return $this->belongsToMany(Coupon::class);
    }
    public function order(){

        return $this->hasMany(Order::class);

    }
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
    public function model(){
        return $this->hasOne('App\Models\Models', 'user_id', 'id');
    }
    public function documents(){
        return $this->hasMany('App\Models\User_documents', 'user_id', 'id');
    }
    public function sleepMode(){
        return $this->hasOne('App\Models\SleepMode', 'model_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function getProviderName(): string
    {
        return strip_tags(ucwords($this->first_name . " " . ($this->last_name) ?? ''));
    }

    public function getProviderAvatarColumn(): string
    {
        return 'profile_image';
    }

    public function getProviderAvatarRoute(string $size = 'sm'): string
    {
        return url('profile-image/' . $this->profile_image);
    }

}
