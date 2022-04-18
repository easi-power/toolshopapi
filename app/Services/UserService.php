<?php

namespace App\Services;

use App\Models\User;

class UserService implements CrudService
{
    public function get()
    {
        return User::all();
    }

    public function getOne(int $id)
    {
        return User::find($id);
    }

    public function store(array $userdata)
    {
        return User::create($userdata);
    }

    public function update(int $id, array $userdata)
    {
        User::find($id)->update($userdata);
        return User::find($id);
    }

    public function delete(int $id)
    {
        return User::find($id)->delete();
    }
}
