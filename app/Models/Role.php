<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class Role extends \Spatie\Permission\Models\Role
{
    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'guard_name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}