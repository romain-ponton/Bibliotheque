<aside style="width: 20rem;">
    <h2>Categories</h2>
    <ul class="bd-links-nav list-unstyled mb-0 pb-3 pb-md-2 pe-lg-2">
        @foreach($categories as $category)
            <li class="bd-links-group py-2"><a href="{{ route('books.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</aside>
