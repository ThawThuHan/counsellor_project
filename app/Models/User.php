<?php

namespace App\Models;

use Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ["id", "updated_at", "created_at"];

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

    public function scopeFilter($query, $filter)
    {
        $query->when($filter, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where("color", "LIKE", "%" . $search['color'] . "%")
                    ->where("pet", "LIKE", "%" . $search['pet'] . "%")
                    ->where("hobby", "LIKE", "%" . $search['hobby'] . "%");
            })->orWhere(function ($query) use ($search) {
                $query->where("color", "LIKE", "%" . $search['color'] . "%")
                    ->where("pet", "LIKE", "%" . $search['pet'] . "%")
                    ->where("birth_order", "LIKE", "%" . $search['birth_order'] . "%");
            })->orWhere(function ($query) use ($search) {
                $query->where("color", "LIKE", "%" . $search['color'] . "%")
                    ->where("hobby", "LIKE", "%" . $search['hobby'] . "%")
                    ->where("birth_order", "LIKE", "%" . $search['birth_order'] . "%");
            })->orWhere(function ($query) use ($search) {
                $query->where("pet", "LIKE", "%" . $search['pet'] . "%")
                    ->where("hobby", "LIKE", "%" . $search['hobby'] . "%")
                    ->where("birth_order", "LIKE", "%" . $search['birth_order'] . "%");
            });
        });
        // DB::listen(function ($query) {
        //     logger($query->sql);
        // });
    }
}
