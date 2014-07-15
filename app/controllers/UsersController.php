<?php

class UsersController extends \BaseController {

	public function __construct(){
		//parent::__construct();
		 $this->beforeFilter('auth', array('except' => 'getLogin'));
		//$this->filter('before', 'auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	/*public function index()
	{
		$users = Users::all();
		return View::make('users.index') -> with('users', $users);
	}*/

	public function getIndex(){
		$users = User::all();
		return View::make('users.index') -> with('users', $users);
	}

	public function index(){
		$users = User::all();
		return View::make('users.index') -> with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	//Store users v1
	/*public function store()
	{
		
		//$data = Input::all();		

		$user = new User;

		$user->email = Input::get("email");
		$user->real_name = Input::get("real_name");
		$user->password = Input::get("password");

		$user->save();

		return Redirect::to("users");
	}*/
	//Store users v2 with validations
public function store(){
	$rules = array(
		'real_name' => 'required | max:50',
		'email' => 'required | email | unique:users', //tenga formato de email y sea único es decir, no exista ya en la base de datos.
		'password' => 'required | min:5'
	);

	$validation = Validator::make(Input::all(), $rules);

	if($validation->fails()){
		return Redirect::back()->withInput()->withErrors($validation);
	}

	$user = new User;

	$user->email = Input::get("email");
	$user->real_name = Input::get("real_name");
	$user->password = Input::get("password");

	$user->save();

	return Redirect::to("users");
}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);		
		if(is_null($user))
			return Redirect::to('users');
		return View::make('users.edit')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		if(is_null($user))
			return Redirect::to('users');

		$user->real_name = Input::get('real_name');
		$user->email = Input::get('email');

		if(Input::has('password'))
			$user->password = Input::get('password');

		$user->save();

		return Redirect::to('users');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($user_id)
	{
		User::destroy($user_id);

    	return Redirect::to('users');
		/*$user = User::find($user_id);
		if(is_null($user)){
			return Redirect::to('users');
		}
		$user->delete();
		return Redirect::to('users');*/
	}
}
