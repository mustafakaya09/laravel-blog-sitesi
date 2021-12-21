@isset($categories)
<div class="col-md-3">
  <div class="card">
    <div class="card-header">
      Kategoriler
    </div>
    <div class="list-group">

    @foreach ($categories as $category)
      <li class="list-group-item @if(Request::segment(2)==$category->slug) active @endif">
          <a @if(Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}" @endif>{{$category->name}}</a>
          <span style="float:right" class="badge bg-danger">{{$category->articleCount()}}</span>
      </li>
    @endforeach

    </div>
  </div>
</div>
@endif
