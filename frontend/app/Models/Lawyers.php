<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyers extends Model
{
    use HasFactory;
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
}
