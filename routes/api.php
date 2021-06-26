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

    Route::apiResource('categories', 'Api\CategoryController');

    Route::apiResource('posts', 'Api\PostController');

    Route::apiResource('comments', 'Api\CommentController');

    Route::apiResource('join_us', 'Api\JoinUsController');

    Route::apiResource('join_us_tags', 'Api\JoinUsTagController');

    Route::apiResource('staff', 'Api\StaffController');

    Route::apiResource('banners', 'Api\BannerController');

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
