<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
	// Get project by user id
	public function get_Projects_By_User_Id($user_id)
	{
		$projects = DB::table('projects')->select(array('*'))->where('user_id', $user_id)->get();
		return $projects;
	}



	// Get project by project id
	public function get_Project_By_Project_Id($project_id)
	{
		$projects = DB::table('projects')->select(array('*'))->where('id', $project_id)->get();
		return $projects;
	}



	// Create Project
	public function create_Project(Request $request)
	{
		$current_time = \Carbon\Carbon::now()->toDateTimeString();
		$current_timestamp = \Carbon\Carbon::now()->timestamp;

		// var_dump($request->all());

		$response = DB::table('projects')->insert([
			'user_id' => $request->user_id,
			'name' => $request->name,
			'color' => $request->color,
			'created_at' => $current_timestamp,
		]);
		if ( $response === true ) {
			return response()->json(['true']);
		}
		else {
			return response()->json(['false']);
		}
	}



	// Update Project
	public function update_Project(Request $request, $project_id)
	{
		$current_time = \Carbon\Carbon::now()->toDateTimeString();
		$current_timestamp = \Carbon\Carbon::now()->timestamp;

		$response = DB::table('projects')->where('id', $project_id)->update([
			'user_id' => $request->input('user_id'),
			'name' => $request->input('name'),
			'color' => $request->input('color'),
			'updated_at' => $current_timestamp,
		]);
		if ( $response === 1 ) {
			return response()->json(['true']);
		}
		else {
			return response()->json(['false']);
		}
	}



	public function delete_Project($project_id)
	{
		$response = DB::table('projects')->where('id', '=', $project_id)->delete();
		if ( $response === 1 ) {
			return response()->json(['true']);
		}
		else {
			return response()->json(['false']);
		}
	}
}
