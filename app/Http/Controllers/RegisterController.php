<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $divisions = DB::table('divisions')->get();
        $districts = DB::table('districts')->get();
        return view('register',compact('divisions', 'districts'));
    }

    public function submitRegistrationForm(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'birthday' => 'required|date',
            'password' => 'required|string|min:8',
            'skills' => 'required|array',
            'division' => 'required|string',
            'district' => 'required|string',
            'languages' => 'required|array',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maximum upload 2 MB
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('images');

        // Create user
        $user = new Registration();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->birthday = $validatedData['birthday'];
        $user->password = bcrypt($validatedData['password']);
        $user->skills = implode(',', $validatedData['skills']);
        $user->division = $validatedData['division'];
        $user->district = $validatedData['district'];
        $user->favorite_languages = implode(',', $validatedData['languages']);
        $user->image = $imagePath;
        $user->save();

        // Redirect or do something else
        return redirect()->back()->with('success', 'Registration successful!');
    }
}
