<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function find($id)
    {
        return User::find($id);
    }

    public function create($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => strtolower($data['email']),
            'password' => bcrypt($data['password']),
            'user_types_id' => $data['user_types_id']
        ]);
    }

    public function me($id)
    {
        $query = User::with('user_type')->where('id', $id)->get();

        return $query;
    }
}
