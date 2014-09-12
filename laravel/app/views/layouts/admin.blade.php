@extends('layouts.master')
@section('body')
        <!--Start Content -->
        <div class="gridrow">
            <!--Start Side Navigation -->
            <aside class="infobar col4">
            @section('infobar')
                <h2>Admin Menu</h2>
                <nav>
                    <ul>
                        <li>{{link_to_action('CategoryController@index', 'Manage Categories')}}</li>
                        <li>{{link_to_action('PageController@index', 'Manage Pages')}}</li>
                        <li>{{link_to_action('UserController@index', 'Manage Users')}}</li>
                        <li>{{link_to_action('AccessController@getLogout', 'Logout')}}</li>
                    </ul>
                </nav>
            @show
            </aside>
            <!--End Side Navigation -->
            <div class="col8">
                @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class', 'alert-info')}}">
                    {{Session::get('message')}}
                </div>
                @endif
            @yield('content')
            </div>
        </div>
        <!-- End Content -->
@stop
