@extends('layouts.master')
@section('title'){{$page->title}} - @stop
@section('description'){{$page->description}}@stop

@section('body')
        <!--Start Content -->
        <div class="gridrow">
            <!--Start Side Navigation -->
            <aside class="infobar col4">
                @section('infobar')
                    @if ($page->subnav)
                        @include('layouts._sub-nav', array('page' => $page))
                    @endif

                    @foreach ($posts as $post)
                        @if ($post->content_placement == 'infobar')
                            {{$post->content}}
                        @endif
                    @endforeach
                @show
            </aside>
            <!--End Side Navigation -->
            <div class="col8 last">
            @section('content')
                @foreach ($posts as $post)
                    @if ($post->content_placement == 'content')
                        @if ($post->content_type == 'code')
                            <pre>
                                <code {{$post->container_attr}}>{{{$post->content}}}</code>
                            </pre>
                        @elseif($page->permalink == 'contact')
                            {{$post->content}}
                            @include('public._contact-form')
                        @else
                            <article {{$post->container_attr}}>
                                {{$post->content}}
                            </article>
                        @endif
                    @endif
                @endforeach
            @show
            </div>
        </div>
        <!-- End Content -->
@stop

{{-- load syntax highlighting scripts if post is code --}}
@if (isset($post->content_type) && $post->content_type == 'code')
    @section('footscripts')
    @parent
        {{ HTML::style('js/libs/highlight/styles/googlecode.css'); }}
        {{ HTML::script('js/libs/highlight/highlight.min.js'); }}
    @stop
@endif
