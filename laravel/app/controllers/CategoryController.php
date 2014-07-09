<?php

class CategoryController extends BaseController {

    protected $category;

    public function __construct(Category $category){
        $this->category = $category;
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
        $categories = $this->category->sorted()->get();
        return View::make('categories.index', compact('categories'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
        $category_count = count($this->category->all()) + 1;
        $categories = $this->category->lists('title', 'id');
        array_unshift($categories, "None"); // Add default value to beginning of array
		return View::make('categories.create', compact('category_count', 'categories'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Category::$rules);

        if($validator->fails()){
            $category_count = count($this->category->all()) + 1;
            return Redirect::to('categories/create')
                ->withErrors($validator)
                ->withInput(Input::all())
                ->with('category_count', $category_count);
        }else{
            $category = new Category(Input::all()) ;
            $category->save();
            Session::flash('message', 'Category created successfully');
            return Redirect::to('categories');
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
        $category = $this->category->find($id);
        return View::make('categories.show', compact('category'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return View
	 */
	public function edit($id)
	{
        $category_count = count($this->category->all());
        $category = $this->category->find($id);
        $categories = $this->category->lists('title', 'id');
        array_unshift($categories, "None");
        return View::make('categories.edit', compact('category', 'categories', 'category_count'));
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
        $validator = Validator::make($input, Category::$rules);

        if($validator->fails()){
            $category_count = count($this->category->all());
            return Redirect::to('categories/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::all())
                ->with('category_count', $category_count);
        }else{
            $category = $this->category->find($id);
            $category->update($input);
            Session::flash('message', 'Category updated successfully');
            Session::flash('alert-class', 'alert-success');
            return View::make('categories.show', compact('category'));
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
        $category = $this->category->find($id);
        return View::make('categories.delete', compact('category'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $category = $this->category->find($id);
        $category->delete();

        Session::flash('message', 'Category deleted successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('categories');
	}

}
