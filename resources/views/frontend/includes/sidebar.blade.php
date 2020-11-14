
<div class="cat_menu_container">
    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
        <div class="cat_burger"><span></span><span></span><span></span></div>
        <div class="cat_menu_text">categories</div>
    </div>
    @php
    $categories = DB::table('categories')->get();
@endphp
<ul class="cat_menu">
    @foreach($categories as $category)
    <li class="hassubs">
    <a href="#">{{ $category->category_name}} <i class="fas fa-caret-right"></i></a>
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
</div>