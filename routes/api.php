<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DonorController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\JoinUsController;
use App\Http\Controllers\Api\JoinUsTagController;
use App\Http\Controllers\Api\NumberOverviewController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OptionController;
use App\Http\Controllers\Api\PartnerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\VNPAYController;
use App\Http\Controllers\Api\SendEmailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('number_overviews', NumberOverviewController::class)->except(['store', 'destroy']);

    Route::apiResource('categories', CategoryController::class);

    Route::apiResource('posts', PostController::class);

    Route::apiResource('join_us', JoinUsController::class);

    Route::apiResource('join_us_tags', JoinUsTagController::class);

    Route::apiResource('feedback', FeedbackController::class);

    Route::apiResource('partners', PartnerController::class);

    Route::apiResource('banners', BannerController::class);

    Route::apiResource('notifications', NotificationController::class);

    // ---------------------------------------- Donation ----------------------------------------

    Route::apiResource('donors', DonorController::class);

    Route::apiResource('options', OptionController::class)->except(['store', 'destroy', 'update']);

    Route::apiResource('transactions', TransactionController::class);

    Route::apiResource('donate-by-vnpay', VNPAYController::class)->except(['destroy', 'update', 'index']);

    // ---------------------------------------- Send Email ----------------------------------------
    Route::post('send_email_recuitment', [SendEmailController::class, 'EmailRecuitment'])->middleware('client');
});

/**
 * List table:
 * number_overviews
 * categories
 * posts
 * join_us
 * join_us_tags
 * feedback
 * partners
 * banners
 * notifications
 * donors
 * transactions
 * options
 */


// Route get for client

Route::prefix('client')->group(function () {
    Route::apiResource('/number_overviews', NumberOverviewController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('categories', CategoryController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('posts', PostController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('join_us', JoinUsController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('join_us_tags', JoinUsTagController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('feedback', FeedbackController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('partners', PartnerController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('banners', BannerController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('notifications', NotificationController::class)->except(['index', 'show', 'destroy', 'update'])->middleware('client');

    // ---------------------------------------- Donation ----------------------------------------

    Route::apiResource('donors', DonorController::class)->except(['destroy'])->middleware('client');

    Route::apiResource('options', OptionController::class)->except(['store', 'destroy', 'update'])->middleware('client');

    Route::apiResource('transactions', TransactionController::class)->except(['destroy', 'update'])->middleware('client');

    Route::apiResource('donate-by-vnpay', VNPAYController::class)->except(['destroy', 'update', 'index'])->middleware('client');

    // ---------------------------------------- Send Email ----------------------------------------
    Route::post('send_email_recuitment', [SendEmailController::class, 'EmailRecuitment'])->middleware('client');
});
