@extends('layouts.master')
@section('title', 'Home - ')
@section('description', 'You are a Web, Application, and Database Developer for hire.')
@section('body')
<!--Start Content -->
		<div class="gridrow">
			{{HTML::image('images/Home.jpg', 'Yoursite.com Web Development', array('class' => 'col12'));}}
		</div>
        <div class="gridrow">
            <h2 class="main-headline col12">Featured Work</h2>
        </div>
        <div class="gridrow">
            <div class="col4" id="feature-item-1">
                <a href="{{URL::to('portfolio/some-company')}}" class="feature" >
                    <div class="lbl-feature">
                        <h4>&ltsome-company.com&gt;</h4>
                        <p>Some Company</p>
                    </div>
                    {{HTML::image('upload/feature-code.jpg', 'My Code Area');}}
                </a>
            </div>
            <div class="col4" id="feature-item-2">
                <a href="{{URL::to('portfolio/another-company')}}" class="feature">
                    <div class="lbl-feature">
                        <h4>&lt;another-company.com&gt;</h4>
                        <p>Another Company</p>
                    </div>
                    {{HTML::image('upload/feature-code.jpg', 'My Code Area');}}
                </a>
            </div>
            <div class="col4 last sm_dev">
                <a href="{{URL::to('code')}}" class="feature">
                    <div class="lbl-feature">
                        <h4>&lt;code&gt;</h4>
                        <p>My Code Samples</p>
                    </div>
                    {{HTML::image('upload/feature-code.jpg', 'My Code Area');}}
                </a>
            </div>
        </div>
        <div class="gridrow">
            <div class="col12">
                <h2 class="main-headline">Purpose</h2>
            </div>
            <article class="col8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
				nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
				esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
				in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
				nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
				esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
				in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </article>
            <aside class="infobar col4 last sm_dev">
                <h2>Connect</h2>
                <nav>
                    <ul>
                        <li>{{link_to(URL::to('https://github.com'), 'Follow Me on GitHub', array('target' => '_blank'))}}</li>
						<li>{{link_to(URL::to('https://www.linkedin.com'), 'Connect With Me on LinkedIn', array('target' => '_blank'))}}</li>
                        <li>{{link_to_asset('upload/your_resume.pdf', 'Download My Resume', array('target' => '_blank'))}}</li>
                        <li>{{link_to(URL::to('contact'), 'Contact Form')}}</li>
                    </ul>
                </nav>
            </aside>
        </div>
		<!-- End Content -->
@stop