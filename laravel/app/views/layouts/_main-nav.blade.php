<!--Start Navigation -->
<div id="menu_bar" class="col-full">
    <div class="menu-title"><h2>{{link_to(URL::route('home'), 'Yoursite.com')}}</h2></div><!-- This is the toggle div for responsive menu -->
    <nav id="topnav">
        <ul>

        @foreach($navItems->sortBy('position') as $item)
            @if(count($item['children']) == 0)
                <li><a href="{{URL::to(''. $item->permalink .'')}}">{{ $item->title }}</a></li>
            @else
                <li class="has-submenu"><a href="{{URL::to(''. $item->permalink .'')}}">{{ $item->title }}</a>
                    <ul class="sub-menu">
                        <li><a href="{{URL::to(''. $item->permalink .'')}}">{{ $item->title }} Overview</a>
                        @foreach($item['children']->sortBy('position') as $child)
                        <li><a href="{{URL::to(''. $item->permalink . '/' . $child->permalink .'')}}">{{ $child->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
        </ul>
    </nav>
</div>
<!--End Navigation -->