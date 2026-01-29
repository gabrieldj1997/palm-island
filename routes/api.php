<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Game\UseCases\CreateGame;
use App\Game\UseCases\DiscardCard;
use App\Game\UseCases\NextTurn;
use App\Game\UseCases\PurchaseCard;
use App\Game\UseCases\RotateCard;
use App\Game\UseCases\FlipCard;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    $useCase = app(CreateGame::class);
    return $useCase->execute(1);
});

Route::group(['prefix' => '/games'], function () {
    Route::post('/create', function () {
        $useCase = app(CreateGame::class);
        return $useCase->execute(Auth::id());
    });
    Route::get('/{id}/discard', function ($id) {
        $useCase = app(DiscardCard::class);
        return $useCase->execute($id);
    });
    Route::post('/{id}/purchasecard', function ($id) {
        $useCase = app(PurchaseCard::class);
        return $useCase->execute($id, request()->input('action_card'), request()->input('spent_cards'));
    });
    Route::post('/{id}/rotatecard', function ($id) {
        $useCase = app(RotateCard::class);
        return $useCase->execute($id, request()->input('action_card'), request()->input('spent_cards'));
    });
    Route::post('/{id}/flipcard', function ($id) {
        $useCase = app(FlipCard::class);
        return $useCase->execute($id, request()->input('action_card'), request()->input('spent_cards'));
    });
    Route::get('/{id}/endturn', function ($id) {
        $useCase = app(NextTurn::class);
        return $useCase->execute($id);
    });
});
