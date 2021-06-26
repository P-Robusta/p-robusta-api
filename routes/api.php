<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Models\NumberOverview;

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
    Route::apiResource('number_overviews', NumberOverview::class)->except(['store', 'destroy']);
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('categories', 'Api\CategoryController');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('posts', 'Api\PostController');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('comments', 'Api\CommentController');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('join_us', 'Api\JoinUsController');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('join_us_tags', 'Api\JoinUsTagController');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('staff', 'Api\StaffController');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('banners', 'Api\BannerController');
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('donor_information', 'Api\DonorInformationController');
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
