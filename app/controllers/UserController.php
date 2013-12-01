<?php

class UserController extends BaseController {

	protected $layout = 'main';

	public function login()
	{
        $this->layout->content = View::make('user.login');
	}

	public function authenticate(){
		$user = array(
		            'username' => Input::get('username'),
		            'password' => Input::get('password')
		        );
		        
	    if (Auth::attempt($user)) {
	        return Redirect::route('index')
	            ->with('flash_notice', 'You are successfully logged in.');
	    }
	    
	    // authentication failure! lets go back to the login page
	    return Redirect::route('login')
	        ->with('flash_error', 'Your username/password combination was incorrect.')
	        ->withInput();
	}

	public function logout(){
		Auth::logout();
		Session::flush();
		
	    return Redirect::route('index')
	        ->with('flash_notice', 'You are successfully logged out.');
	}
	public function create()
	{
        $this->layout->content = View::make('user.register');
	}

	
	public function store()
	{
		$username =  strtolower(Input::get('username'));
		
		if(Input::get('password') == Input::get('repeat-password')){
		    $user = new User(array(
		                'username' => $username,
		                'password' => Hash::make(Input::get('password')),
		                ));
		    if($user->save()){
		        $user = User::where('username', '=', $username)->first();
		        Auth::login($user);

		        return Redirect::route('index')
		            ->with('flash_notice', 'You are successfully registered.');
		    }else{
		        return Redirect::route('register')
		            ->with('flash_error', 'Sorry, failed to register')
		            ->withInput();
		    }
		}else{
		    return Redirect::route('register')
		        ->with('flash_error', 'Passwords do not match.')
		        ->withInput();
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        $this->layout->content = View::make('user.profile');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
        $this->layout->content = View::make('user.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$user = array(
				'username'=>Auth::user()->username,
				'password'=>Input::get('original'),
				);

		if(Auth::validate($user)){
			if(Input::get('password')==Input::get('repeat-password')){
				$user = User::where('username','=',Auth::user()->username)->first();
				$user->password = Hash::make(Input::get('password'));

				if($user->save())
					return Redirect::route('profile')
		            ->with('flash_notice', 'Profile successfully updated.');
			}

		}

		return Redirect::route('editProfile')
		    ->with('flash_error', 'Profile could not be updated.')
		    ->withInput();
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
