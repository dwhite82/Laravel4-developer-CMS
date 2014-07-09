<nav>
@if(count($page['children']) == 0 && $page->parent_id > 0)
    <h2>{{ $page['parent']->title }}</h2>
    <ul>
        @foreach($page['parent']['children']->sortBy('position') as $link)
            <li><a href="{{URL::to(''. $page['parent']->permalink .'/' . $link->permalink . '') }}">{{ $link->title }}</a></li>
        @endforeach
    </ul>
@else
    <h2>{{ $page->title }}</h2>
    <ul>
        <!--<li><a href="{{URL::to(''. $page->permalink .'')}}">{{ $page->title }} Overview</a></li>-->
        @foreach($page['children']->sortBy('position') as $child)
            @if ($page['parent'])
                <li><a href="{{URL::to(''. $page['parent']->permalink .'/' . $page->permalink .'/' . $child->permalink . '') }}">{{ $child->title }}</a></li>
            @else
                <li><a href="{{URL::to(''. $page->permalink . '/' . $child->permalink .'')}}">{{ $child->title }}</a></li>
            @endif
        @endforeach
    </ul>
@endif
</nav>