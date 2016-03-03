<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach ($categories as $category)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#{{ $category->name }}">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    {{ $category->name }} - ({{ count($category->posts()->get()) }})
                </a>
            </h4>
        </div>
        <div id="{{ $category->name }}" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    @foreach ($category->posts()->get() as $post)
                    <li><a href="{{url('blog/'.$post->slug)}}"> {{$post->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div><!--/category-products-->
