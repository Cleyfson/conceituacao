<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Domains\Auth\Services\AuthService;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            
            $data = $this->authService->register($request->validated());
            
            return response()->json([
                'message' => 'Usuário registrado com sucesso.',
                'data' => $data
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Erro ao registrar usuário.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
