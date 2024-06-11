<?php

namespace App\Http\Controllers;

class CsrfController extends Controller
{
    public function showToken() {
        // dd(csrf_token());
        return response()->json([
            'token' => csrf_token()
        ]);
    }
}
