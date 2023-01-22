<!--<h5 style="text-align: center">Categories</h5>-->
<h5>Categories</h5>
<ul class="cat-menu " >
    <li  id="all" onclick="ViewAllProcuts()"  style="" class="category_menu p-1 mb-2">All</li>
    @foreach( $categories as $category )
        <li id="{{$category->id}}" onclick="ViewProcuts('{{$category->id}}')"  class="category_menu p-1 mb-2">{{$category->category_name}}</li>
    @endforeach
</ul>
