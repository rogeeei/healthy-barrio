<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    // Display a list of users pending approval
    public function approveUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->approved = 1; // Approve the user
            $user->save();

            return response()->json(['message' => 'User approved successfully.'], 200);
        }

        return response()->json(['message' => 'User not found.'], 404);
    }

    public function declineUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete(); // Delete the user

        return response()->json(['message' => 'User deleted successfully']);
    }
}
