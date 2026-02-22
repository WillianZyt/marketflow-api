<?php

namespace App\Services\Api\V1;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function update(User $user, array $data): User
    {
        if (isset($data['role'])) {
            $role = Role::where('slug', $data['role'])->first();

            if ($role) $data['role_id'] = $role->id;
            unset($data['role']);
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->fill($data);
        $user->save();

        return $user;
    }
}
