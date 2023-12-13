<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return "Hello World";
    }
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'name' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages()->add('status', 'fails'));
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password')); // Hash the password
        $user = User::create($data);
        return response()->json(['status' => 'passes', 'data' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
