
<div class="list-group">
    <a href="#" class="list-group-item active">
                Категории
    </a>
     @foreach($category as $cat)
    <a href="/category/{{$cat->id}}" class="list-group-item">{{$cat->name}}</a>
    @endforeach
</div>
