<?php

class PublicController extends BaseController {


	public function __construct(){
        $this->beforeFilter('csrf', array('on'=>'post'));
    }
    /**
     * Retrieve Home Page
     *
     * @return View
     */
	public function index()
	{
        return View::make('public.home');
	}

    /**
     * Retrieve Most Public pages
     *
     * @todo validate all URL chunks
     * @param $permalink
     * @return View
     */
    public function show($permalink) {

        if (strpos($permalink, '/')){
            $permalink = substr(strrchr($permalink, "/"), 1);
        }

        $page = Page::visible()->where('permalink','=',$permalink)->first();
        $posts = Post::visible()->sorted()->where('page_id', '=',$page->id)->get();

        //$menu = Page::with('parent')->get();

        return View::make('public.page')->with(array(
            'page' => $page,
            'posts' => $posts
        ));
    }

    /**
     * Deal with POST data from contact form submission
     *
     * @return Response
     */
    public function contact()
    {
        $data = Input::all();

        //Validation rules
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            Mail::send('emails.contact-response', $data, function ($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('you@youremailaddress.com', 'Your Name')->subject('Contact Form Submission From: ' . $data['name'] . '');
            });
            return Redirect::to('contact')
                ->with('message', 'Your information has been submitted')
                ->with('alert-class', 'alert-success');
        } else {
            return Redirect::to('contact')
                ->withErrors($validator)
                ->with('message', 'There were errors in your submission.')
                ->with('alert-class', 'alert-danger')
                ->withInput();
        }
    }
}
