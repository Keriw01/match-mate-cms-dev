<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
            if ($users->isEmpty()) {
                return response()->json(['message' => 'No users found'], 404);
            }
            return response()->json($users);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
