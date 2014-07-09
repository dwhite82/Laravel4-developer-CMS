<h2>Post Actions</h2>
<nav>
    <ul>
        <li>{{link_to_action('PostController@create', 'Add New Post', array('page_id' => Input::get('page_id')))}}</li>
    </ul>
</nav>