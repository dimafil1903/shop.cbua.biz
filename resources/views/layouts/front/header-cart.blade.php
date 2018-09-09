

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav categories">
<li class="nav-item">
        <div class="dropdown btn-group bootstrap-select">
            <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="Categories"><span class="filter-option pull-left">Категорії:</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                @include('layouts.front.category-nav')

            </div>
        </div>
</li>
</ul>
    <ul class="navbar-nav  ">


<div class="row">
        <form action="{{route('search.product')}}" class="form-inline " method="get" id="admin-search" style="margin-left: 20px;margin-right:20px;">
            <div class="advanced_search_area">
                <select name="category" id="inputState"  class="selectpicker" onchange="fireSubmit(event)">
                    <option value="all">Всі</option>
                    @foreach($categories as $category)
                        <option @if(request()->input('category')=="$category->slug") selected @endif value="{{$category->slug}}"> {{$category->name}}</option>
                    @endforeach
                </select>
                <div class="input-group">
                    <input type="text" name="q" required class="form-control" placeholder="Я шукаю..." value="{!! request()->input('q') !!}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" id="search-btn" type="submit"><i class="icon-magnifier icons"></i></button>
                                        </span>
                </div>
            </div>
        </form>

</div>


        <li class="nav-item   active">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Home
            </a>

        </li>


        <li class="nav-item dropdown submenu">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pages <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="compare.html">Compare</a></li>
                <li class="nav-item"><a class="nav-link" href="checkout.html">Checkout Method</a></li>
                <li class="nav-item"><a class="nav-link" href="register.html">Checkout Register</a></li>
                <li class="nav-item"><a class="nav-link" href="track.html">Track</a></li>
                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="404.html">404</a></li>
            </ul>
        </li>
<style>

    .dropdown-menu .inner{
        width: 290px;
    }
</style>

    </ul>
</div>