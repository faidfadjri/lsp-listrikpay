<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table        = 'user_roles';
    protected $primaryKey   = 'user_role_id';
    public $timestamps      = true;
    protected $guarded      = ['user_role_id'];
}
