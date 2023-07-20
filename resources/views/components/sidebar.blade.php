<!-- Category -->
<div class="category">
    <ul class="category-list">
        @foreach ($categories as $key => $category)
        <li class="category-item">
            <a href="{{ route('category', ['name' => $category->tendanhmuc, 'id' => $category->id_danhmuc]) }}" class="category-link">
                <img src="{{ asset('uploads/categories/'.$category->image) }}" class="category-img">
                <span class="category-name">{{ $category->tendanhmuc }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>