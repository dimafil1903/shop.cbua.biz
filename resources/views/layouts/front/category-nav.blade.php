<div class="float-panel" style="width:300px;font-size:14px;background:#111;">
    <div id="accordion">
        <ul class="dropdown-menu inner">
    @foreach($categories as $category)



                <li>
                  <a @if(request()->segment(2) == $category->slug) class="dropdown-item" @endif href="{{route('front.category.slug', $category->slug)}}">{{$category->name}} </a>


                <li>



    @endforeach

        </ul>
    </div>

    </div>