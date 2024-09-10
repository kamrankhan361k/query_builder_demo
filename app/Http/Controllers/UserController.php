<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    // Fetch users with specific conditions
    public function activeUsers()
    {
        $activeUsers = DB::table('users')->where('status', 'active')->get();
        return response()->json($activeUsers);
    }

    // Insert new user
    public function insertUser()
    {
        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password123'),
            'age' => 26,
            'status' => 'active',
        ]);

        return response()->json(['message' => 'User added successfully!']);
    }

    // Update user information
    public function updateUser($id)
    {
        DB::table('users')->where('id', $id)->update([
            'name' => 'Updated Name',
            'status' => 'inactive'
        ]);

        return response()->json(['message' => 'User updated successfully!']);
    }

    // Delete a user
    public function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return response()->json(['message' => 'User deleted successfully!']);
    }
}
