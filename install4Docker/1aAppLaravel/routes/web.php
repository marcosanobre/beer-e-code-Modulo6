<?php

use App\Enums\SignatureStatus;
use App\Http\Controllers\ProfileController;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/testeList', function () {
    return view('teste');
});

Route::get('/testeInsert', function () {
    $plan = Plan::create([
        'name' => 'Principal Plan',
        'short_description' => 'Another important plan',
        'price' => 1999
    ]);

    $client = Auth::user()->client()->create( [
        'document' => '00020272077',
        'birthdate' => '1977-11-25'
    ]);

    $client->signatures()->create( [
        'plan_id' => $plan->id,
        'status' => SignatureStatus::ACTIVED
    ]);

    return 'Inseridos: Plano, Cliente e Assinatura';
});
