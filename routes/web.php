<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Show all post
Route::get("/", [ListingController::class, "index"])->name("home");

//Manage lists
Route::get('/manage/lists',[ListingController::class,"userLists"])->name('managelists')->middleware('auth');
//----------------------------------------------------------------------------------------------------------------------
Route::prefix('/listings')->controller(ListingController::class)->name("listings.")->group(function () {
    //Show Create FORM
    Route::get("/create", "create")->name("create")->middleware('auth');

    //Creating new list
    Route::post("/store", "store")->name("store")->middleware('auth');

    //show Single listing
    Route::get('/{listing}', "show")->name("show");

    //Show Edit listing FORM
    Route::get("/{listing}/edit", "edit")->name("edit")->middleware('auth');

    //Editing list and update that
    Route::put("/{listing}","update")->name("update")->middleware('auth');

    //Delete the listing
    Route::delete('/{listing}/delete',"delete")->name("delete")->middleware('auth');

});
//----------------------------------------------------------------------------------------------------------------------
//Show Create listing FORM
//Route::get("listings/create", [ListingController::class, "create"])->middleware('auth');

//Creating new list
//Route::post("listings", [ListingController::class, "store"])->name("listings.store")->middleware('auth');

//show Single listing
//Route::get('/listings/{listing}', [ListingController::class, "show"])->name("listings.show");

//Show Edit listing FORM
//Route::get("/listings/{listing}/edit", [ListingController::class, "edit"])->name("listings.edit")->middleware('auth');

//Editing list and update that
//Route::put("/listings/{listing}", [ListingController::class, "update"])->name("listings.update")->middleware('auth');

//Delete the listing
//Route::delete('listings/{listing}/delete', [ListingController::class, "delete"])->name("listings.delete")->middleware('auth');
//----------------------------------------------------------------------------------------------------------------------
//Show Register FORM
Route::get('/register', [UserController::class, "create"])->middleware('guest');

//Create new user
Route::post('register', [UserController::class, 'store']);

//Show login FORM
Route::get("/login", [UserController::class, 'loginForm'])->name("users.login")->middleware('guest');

//Login the user
Route::post("/users/login", [UserController::class, 'login'])->name("login");

//Logout
Route::post("/logout", [UserController::class, 'logout'])->name("logout")->middleware('auth');
