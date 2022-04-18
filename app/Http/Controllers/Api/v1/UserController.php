<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function index()
    {
        return $this->service->get();
    }

    public function show(int $user_id)
    {
        return $this->service->getOne($user_id);
    }

    public function store(UserStoreRequest $request)
    {
        return response()->json(
            $this->service->store($request->only(['firstname', 'lastname', 'email', 'phone', 'password'])),
            201
        );
    }

    public function update(int $user_id, UserUpdateRequest $request)
    {
        return response()->json(
            $this->service->update($user_id, $request->only(['firstname', 'lastname', 'email', 'phone', 'password'])),
            202
        );
    }

    public function destroy(int $user_id)
    {
        return response()->json(
            $this->service->delete($user_id),
            204
        );
    }
}
