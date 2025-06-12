<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\User\Services\UserService;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(private UserService $userService) {}

    public function index(): JsonResponse
    {
        try {
            $users = $this->userService->getAll();

            return response()->json([
                'message' => 'Lista de usuários recuperada com sucesso.',
                'data' => $users,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Erro ao recuperar lista de usuários.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
      return response()->json([]);
    }

    public function store(Request $request): JsonResponse
    {
      return response()->json([]);
    }

    public function update(Request $request, int $id): JsonResponse
    {
      return response()->json([]);
    }

    public function destroy(int $id): JsonResponse
    {
      return response()->json([]);
    }
}
