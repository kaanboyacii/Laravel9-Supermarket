<ul class="category__menu__dropdown">
@foreach($children as $subcategory)

        @if(count($subcategory->children))
            <li class="">{{$subcategory->title}}</li>
            <ul class="">
                @include('home.categorytree',[children => $subcategory->children])
            </ul>
            <hr>
        @else
            <li><a href="{{route('categoryproducts',['id'=>$subcategory->id])}}">-{{$subcategory->title}}</a></li>
        @endif

@endforeach
</ul>
