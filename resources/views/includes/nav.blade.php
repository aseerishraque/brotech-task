
<nav id="navbar" class="navbar navbar-expand-lg navbar-light border-top border-bottom border-dark" style="background-color: white;">
    <a class="navbar-brand " href="{{ route('home') }}">OSP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="active nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="all-form">

                    @php
                        $all_categories = \App\Category::where('parent_id',NULL)->get();
                    @endphp
                    @foreach($all_categories as $all_cat)
                        <li class="dropdown">
                        <a  class="text-center dropdown-toggle font-weight-normal" href="{{ route('category.product', $all_cat->id) }}"  >
                            {{ $all_cat->name }}
                        </a>
                            @if(count($all_cat->subcategory))
                                @include('includes.subcategories',['subcategories' => $all_cat->subcategory])
                            @endif

                          </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="active nav-link" role="button">
                        Categories CRUD
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="active nav-link" role="button">
                      Products CRUD
                </a>
            </li>
        </ul>
    </div>

</nav>
