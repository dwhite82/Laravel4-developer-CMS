<?php

class PageController extends BaseController {

    protected $page;

    public function __construct(Page $page){
        $this->page = $page;
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
        $pages = $this->page->sorted()->get();
        return View::make('pages.index', compact('pages'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
        $page_count = count($this->page->all()) + 1;
        $pages = Page::all()->lists('title', 'id');
        $categories = Category::all()->lists('title', 'id');
        return View::make('pages.create', compact('page_count', 'pages', 'categories'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make(Input::all(), Page::$rules);

        if($validator->fails()){
            $page_count = count($this->page->all()) + 1;
            return Redirect::to('pages/create')
                ->withErrors($validator)
                ->withInput(Input::all())
                ->with('page_count', $page_count);
        }else{
            $page = new Page(Input::all());
            $page->save();
            Session::flash('message', 'Page created successfully');
            Session::flash('alert-class', 'alert-success');
            return Redirect::to('pages');
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
        $page = $this->page->find($id);
        return View::make('pages.show', compact('page'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return View
	 */
	public function edit($id)
	{
        $page_count = count($this->page->all());
        $page = $this->page->find($id);
        $pages = Page::all()->lists('title', 'id');
        $categories = Category::all()->lists('title', 'id');
        return View::make('pages.edit', compact('page', 'pages', 'page_count', 'categories'));
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
        $validator = Validator::make($input, Page::$rules);

        if($validator->fails()){
            $page_count = count($this->page->all());
            return Redirect::to('pages/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::all())
                ->with('page_count', $page_count);
        }else{
            $page = $this->page->find($id);
            $page->update($input);
            Session::flash('message', 'Page updated successfully');
            Session::flash('alert-class', 'alert-success');
            return View::make('pages.show', compact('page'));
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
        $page = $this->page->find($id);
        return View::make('pages.delete', compact('page'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $page = $this->page->find($id);
        $page->delete();

        Session::flash('message', 'Page deleted successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('pages');
	}


}
