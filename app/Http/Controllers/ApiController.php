<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function protectedRoute(Request $request)
    {
        // Accessible only to authenticated users

        return response()->json([
            'message' => 'You have successfully accessed the protected route.',
            'user' => $request->user(),
        ]);
    }
}
