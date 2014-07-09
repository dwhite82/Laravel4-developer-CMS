<?php

/**
 * Class AccessController
 *
 * This class controls access to Admin pages on the site
 */
class AccessController extends BaseController {


    /**
     * Access Constructor
     *
     */
    public function __construct(){
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only' => 'getIndex'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function getIndex()
	{
        $user = Auth::user();
        return View::make('access.index', compact('user'));
	}

    /**
     * Display a login Form.
     *
     * @return View
     */
    public function getLogin()
    {
        return View::make('access.login');
    }

    /**
     * Process the login info
     *
     * @return Response
     */
    public function postLogin()
    {
        if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
            return Redirect::to('access/index')
                ->with('message', 'You are now logged in!')
                ->with('alert-class', 'alert-success');
        } else {
            return Redirect::to('access/login')
                ->with('message', 'Your username/password combination was incorrect')
                ->with('alert-class', 'alert-danger')
                ->withInput();
        }
    }

    /**
     * Process the login info
     *
     * @return Response
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('access/login')
            ->with('message', 'Your are now logged out!')
            ->with('alert-class', 'alert-success');
    }


}
