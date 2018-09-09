
    <!-- search form -->
    <form action="{{$route}}" method="get" id="admin-search">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Я шукаю..." value="{!! request()->input('q') !!}">
            <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-secondary " style="margin-top: 50px"><i class="icon-magnifier"></i>  </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
