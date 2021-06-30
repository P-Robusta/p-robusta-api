<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\DonorInformationController;
use App\Http\Controllers\Api\JoinUsController;
use App\Http\Controllers\Api\JoinUsTagController;
use App\Http\Controllers\Api\NumberOverviewController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\Api\StaffController;

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

    Route::apiResource('staff', StaffController::class);

    Route::apiResource('banners', BannerController::class);

    Route::apiResource('donor_information', DonorInformationController::class);
});

/**
 * List table:
 * number_overviews
 * categories
 * posts
 * comments
 * join_us
 * join_us_tags
 * staff
 * banners
 * donor_information
 *
 */
