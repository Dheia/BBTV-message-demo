<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = "contacts";

    public function Model()
    {
        return $this->hasOne('App\Models\User', 'id', 'model_id');
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
}

