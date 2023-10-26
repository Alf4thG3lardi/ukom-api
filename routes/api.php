<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
	Route::apiResource("client", ClientController::class);
	Route::apiResource("project", ProjectController::class);
	Route::apiResource("task", TaskController::class);
	Route::apiResource("comment", CommentController::class);
	Route::apiResource("attachment", AttachmentController::class);
})
