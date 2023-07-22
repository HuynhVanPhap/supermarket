<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService implements ServiceInterface
{
    /**
     * @inheritdoc
     */
    public function processing(Request $request): array
    {
        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role_id' => Role::whereValue(config('constraint.roles.admin'))->first()->id
        ];

        return $params;
    }
}
