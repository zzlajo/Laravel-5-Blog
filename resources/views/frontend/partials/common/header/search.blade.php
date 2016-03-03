<div class="search_box pull-right">
    <form role="search" action="{{ URL::route('search') }}" method="GET">
        <input type="text" placeholder="Search" name="query" value="{{ old('query') }}"/>
        <button type="submit" class="btn btn-default">Search</button>

    </form>
</div>
