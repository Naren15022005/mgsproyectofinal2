<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FlujosIEs;

class FlujoIEPolicy
{
    public function view(User $user, FlujosIEs $flujo)
    {
        return $user->hasRole('administrador') || $flujo->usuario_id === $user->id;
    }

    public function update(User $user, FlujosIEs $flujo)
    {
        return $user->hasRole('administrador') || $flujo->usuario_id === $user->id;
    }

    public function delete(User $user, FlujosIEs $flujo)
    {
        return $user->hasRole('administrador') || $flujo->usuario_id === $user->id;
    }
}
