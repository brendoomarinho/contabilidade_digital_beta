<?php

use App\Http\Controllers\CustomAuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/signin');

// protected routes
Route::middleware('auth')->group(function () {
    Route::get('index', [CustomAuthController::class, 'dashboard']);
});

Route::get('signin', [CustomAuthController::class, 'index'])->name('signin');
Route::post('custom-login', [CustomAuthController::class, 'customSignin'])->name('signin.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-register', [CustomAuthController::class, 'customRegister'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//logic reset password

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ], [
        'email.required' => 'É necessário informar um email.',
        'email.exists' => 'Email não cadastrado.',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6|confirmed',
    ], [
        'email.required' => 'É necessário informar o email.',
        'email.exists' => 'Email inválido.',
        'password.required' => 'É necessário informar nova senha.',
        'password.min' => 'Senha deve conter no mínio 6 dígitos.',
        'password.confirmed' => 'Senhas não coincidem.',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->password = Hash::make($password);
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('signin')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
