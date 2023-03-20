<?php

use App\Http\Livewire;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Livewire\Campaigns::class)
    ->name('campaign.index');

Route::get('/players', Livewire\Players::class)
    ->name('player.index');

Route::get('/campaigns/new/{set:code}', Livewire\NewCampaign::class)
    ->name('campaign.create');

Route::get('/campaigns/play/{campaign:id}', Livewire\Play::class)
    ->name('campaign.play');
