<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\User\StoreRequest;
use App\Http\Requests\Api\V1\User\UpdateRequest;
use App\Models\Role;
use App\Services\Api\V1\UserService;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        $users = User::with('role')->get();
        return response()->json($users);
    }

    public function store(StoreRequest $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::where('slug', 'user')->first()->id,
        ]);

        return response()->json($user, 201);
    }

    public function show(int $id): JsonResponse
    {
        $user = User::with('role')->findOrFail($id);
        return response()->json($user);
    }

    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        $user = User::findOrFail($id);

        $request->validated();

        $this->userService->update($user, $request->all());

        return response()->json($user);
    }

    public function destroy($id): JsonResponse
    {
        User::destroy($id);
        return response()->json(null, 204);
    }
}
