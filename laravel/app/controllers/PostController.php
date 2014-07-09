<?php

class PostController extends BaseController {

    protected $post;

    public function __construct(Post $post){
        $this->post = $post;
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
        $page_id = urldecode(Input::get('page_id'));
        $posts = $this->post->where('page_id', $page_id)->sorted()->get();
        return View::make('posts.index', compact('posts'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
        $post_count = count($this->post->all()) + 1;
        return View::make('posts.create', compact('post_count'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make(Input::all(), post::$rules);

        if($validator->fails()){
            $post_count = count($this->post->all()) + 1;
            return Redirect::to('posts/create')
                ->withErrors($validator)
                ->withInput(Input::all())
                ->with('post_count', $post_count);
        }else{
            $post = new Post(Input::all());
            $post->save();
            Session::flash('message', 'Post created successfully');
            Session::flash('alert-class', 'alert-success');
            return Redirect::to('posts?page_id=' . $post->page->id);
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
        $post = $this->post->find($id);
        return View::make('posts.show', compact('post'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return View
	 */
	public function edit($id)
	{
        $post_count = count($this->post->all());
        $post = $this->post->find($id);
        //$pages_list = $this->post->lists('title', 'page_id');
        //array_unshift($pages_list, "None");
        return View::make('posts.edit', compact('post', 'post_count'));
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
        $validator = Validator::make($input, Post::$rules);

        if($validator->fails()){
            $post_count = count($this->post->all());
            return Redirect::to('posts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::all())
                ->with('post_count', $post_count);
        }else{
            $post = $this->post->find($id);
            $post->update($input);
            Session::flash('message', 'Post updated successfully');
            Session::flash('alert-class', 'alert-success');
            return View::make('posts.show', compact('post'));
        }
	}

    /**
     * Take user to confirmation post before deleting resource.
     *
     * @param  int  $id
     * @return View
     */
    public function getDelete($id)
    {
        $post = $this->post->find($id);
        return View::make('posts.delete', compact('post'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $post = $this->post->find($id);
        $post->delete();

        Session::flash('message', 'Post deleted successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('posts?page_id=' . $post->page->id);
	}


}
