<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $table = 'users';
    use HasFactory;
}
