<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lawyers extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;
    protected $table = 'lawyers';
    protected $primaryKey = 'id';
    protected $fillable = ['first_name',
                            'last_name',
                            'date_of_birth',
                            'gender',
                            'Field',
                            'phone_number',
                            'email',
                            'education',
                            'accomplishment',
                            'is_banned',
                            ];

    protected $hidden = [
        'password'
    ];
}
