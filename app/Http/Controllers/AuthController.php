<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function userLogin()
    {
        return view('admin.auth.login', [
            'title' => 'Admin Login',
        ]);
    }

    public function login(Request $request)
    {
        // Determine the type of credential entered by the user
        $credentialType = filter_var($request->input('credential'), FILTER_VALIDATE_EMAIL) ? 'email' : (is_numeric($request->input('credential')) ? 'phone_number' : 'username');

        // Make request to backend API based on credential type
        $response = Http::post('http://localhost:8080/api/user/login', [
            $credentialType => $request->input('credential'),
            'password' => $request->input('password'),
        ]);

        $responseData = $response->json();

        if ($response->successful() && $responseData['success'] == 1) {
            $user = $responseData['data'];
            $token = $responseData['token'];

            // Save token in session
            $request->session()->put('user_token', $token);

            return redirect()->route('admin.dashboard'); // Redirect to dashboard or any desired page
        } else {
            // Handle unsuccessful login
            return redirect()->back()->withInput()->withErrors(['message' => $responseData['message']]);
        }
    }
}
