<?php

class UserController extends \BaseController {

    protected $user;

    public function __construct(User $user){
        $this->user = $user;
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $users = $this->user->sorted()->get();
        return View::make('users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $users = $this->user->get();
        return View::make('users.create', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), User::$rules);

        if($validator->fails()){
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation'));
        }else{
            $user = new User(Input::except('password', 'password_confirmation'));
            $user->password = Hash::make(Input::get('password'));
            if($user->save()){
                Auth::loginUsingId($user->id);
                Session::flash('message', 'User created successfully');
                return Redirect::to('users');
            }
           // $user->save();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        return View::make('users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        return View::make('users.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response/View
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validator = Validator::make($input, User::$rules);

        if($validator->fails()){
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation'));
        }else{
            $user = $this->user->find($id);
            $input['password'] = Hash::make(Input::get('password'));
            //$user->save();
            $user->update($input);
            Session::flash('message', 'User updated successfully');
            return View::make('users.show', compact('user'));
        }
    }

    /**
     * Take user to confirmation page before deleting resource.
     *
     * @param  int  $id
     * @return View
     */
    public function getDelete($id)
    {
        $user = $this->user->find($id);
        return View::make('users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();

        Session::flash('message', 'User deleted successfully');
        return Redirect::to('users');
    }


}
