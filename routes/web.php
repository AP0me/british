<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;

Route::get('/', function () {
    return view('english');
});

Route::post('/contact', function (Request $request) {
    $first_name = $request->get("first_name");
    $last_name = $request->get("last_name");
    $email = $request->get("email");
    $mobile = $request->get("mobile");
    $branch = $request->get("branch");
    try {
        Mail::to($email)->send(
            new ContactMail($first_name, $last_name, $email, $mobile, $branch)
        );
        return response()->json([
            'status' => 'success',
            'message' => 'Email sent successfully!'
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to send email.',
            'error' => $e->getMessage()
        ], 500);
    }
});
