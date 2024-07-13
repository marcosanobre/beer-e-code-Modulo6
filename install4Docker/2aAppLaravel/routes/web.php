<?php

use App\Enums\SignatureStatus;
use App\Http\Controllers\ProfileController;
use App\Models\Plan;
use App\Models\Signature;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SignatureController;

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

Route::get('/test', [SignatureController::class,'index']);

/* 
Route::get('/test', function () {
    $plan = Plan::create( [
        'name'=> 'Last Plan',
        'short_description' => 'A terrible plan',
        'price'=> 2999
    ] );

    $client = Auth::user()->client()->create( [
        'document' => '01010101001',
        'birthdate'=> '1992-07-20'
    ] );

    $client->signatures()->create( [ 
        'plan_id' => $plan->id,
        'status' => SignatureStatus::ACTIVED
    ] );
 //      'client_id' => $client->id,

    return "hey CLient:{$client->id} Plan: {$plan->id}";
);
*/

