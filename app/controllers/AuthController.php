<?php
class AuthController extends BaseController{
	public function getLogin(){
		// Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('users');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
		return View::make('auth.login');
	}

	public function postLogin(){
		$credentials = array(
			'email' => Input::get('email'), 
			'password' => Input::get('password')
		);	
		//echo 'email: '.Input::get('email')." - ".'password: '.Input::get('password');
		if(Auth::attempt($credentials)){
			
			return Redirect::to('users');
		}
		else{
			return Redirect::back()->withInput();
			/*return Redirect::to('login')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();*/
		}		
	}

	public  function getLogout(){
		Auth::logout();
		return Redirect::to('');
	}
}