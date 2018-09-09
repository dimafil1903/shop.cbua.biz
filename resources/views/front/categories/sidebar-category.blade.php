<ul class="navbar-nav">
    <style>
        .l_p_categories_widget .navbar-nav li a{
            border-bottom: 0px ;
        }
    </style>


        @if($category->children()->count() > 0)

                    @foreach($category->children as $sub)
                        <li class="nav-item"><a class="nav-link" href="{{route('front.category.slug', $sub->slug)}}">{{$sub->name}}</a></li>
                    @endforeach


        @endif


</ul>