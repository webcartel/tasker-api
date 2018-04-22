<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('projects/user_id/{user_id}', 'ProjectsController@get_Projects_By_User_Id');
Route::get('projects/project_id/{project_id}', 'ProjectsController@get_Project_By_Project_Id');
Route::put('projects/create', 'ProjectsController@create_Project');
Route::post('projects/update/{project_id}', 'ProjectsController@update_Project');
Route::delete('projects/delete/{project_id}', 'ProjectsController@delete_Project');