<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Game\UseCases\CreateGame;
use App\Game\UseCases\DiscardCard;
use App\Game\UseCases\PurchaseCard;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    $useCase = app(CreateGame::class);
    return $useCase->execute(1);
});

Route::group(['prefix' => '/games'], function () {
    Route::get('/create', function (Request $request) {
        $useCase = app(CreateGame::class);
        return $useCase->execute(1);
    });
    Route::get('/{id}/discard', function ($id) {
        $useCase = app(DiscardCard::class);
        return $useCase->execute($id);
    });
    Route::post('/{id}/purchase', function ($id) {
        $useCase = app(PurchaseCard::class);
        return $useCase->execute($id, request()->input('purchase_card'), request()->input('spent_cards'));
    });
});
