


<div class="mega-dropdown-second">
    <nav class="dropdown-second-nav">
        <h4 class="title">{{ App\Models\Category::find($parent_id)->title }}</h4>
        <ul>
            @foreach (App\Models\Category::where('parent_id', '=', $parent_id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get() as $sub_category)
                <li>
                    <a href="{{ route('products', get_category_params($sub_category)) }}">{{ $sub_category->title }}</a>
                    <div class="mega-subInner-drop">
                        <ul class="mega-dropdown-products">
                            @foreach (App\Models\Category::where('parent_id', '=', $sub_category->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get() as $sub_sub_category)
                                <li>
                                    <a href="{{ route('products', get_category_params($sub_sub_category)) }}" class="single-product">
                                        <img src="{{ asset($sub_sub_category->thumbnail) }}" alt="">
                                        <span>{{ $sub_sub_category->title }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
