@php
    $categories = DB::table('categories')->get();
@endphp
<ul class="cat_menu">
    @foreach($categories as $category)
    <li class="hassubs">
    <a href="#">{{ $category->category_name}}</a>
        <ul>
            @php
                 $subcategories = DB::table('sub_categories')->where('category_id',$category->id)->get();
            @endphp
            @foreach($subcategories as $subcategory)
            <li class="hassubs">
            <a href="#">{{ $subcategory->subcategory_name }}</a> 
            </li>
            @endforeach
        </ul>
    </li>
    @endforeach
</ul>