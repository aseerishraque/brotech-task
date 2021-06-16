@foreach($subcategories as $subcategory)
    <ul class="dropdown-menu" aria-labelledby="all-form">
        <li class="dropdown">
            <a class="text-center dropdown-toggle font-weight-normal" href="#">
                <a href="{{ route('category.product', $subcategory->id) }}">
                    {{$subcategory->name}}
                </a>
            </a>
            @if(count($subcategory->subcategory))
                @include('includes.subcategories',['subcategories' => $subcategory->subcategory])
            @endif
        </li>

    </ul>
@endforeach
