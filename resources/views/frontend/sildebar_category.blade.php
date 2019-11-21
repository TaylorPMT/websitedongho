@php
    use App\Models\Category;
    $listcat=Category::where(['status'=>1,'parentid'=>0])->get();

@endphp
{{--  <!!--category-->  --}}
@if (count($listcat))
    <ul class="list-group">
        <li class="list-group-item active">Danh Mục Sản Phẩm</li>
    @foreach ($listcat as $cat)

            <li class="list-group-item"><a href="{{url('san-pham/'.$cat->slug)}}">{{ $cat->name }}</a></li>


    @endforeach
   </ul>
@endif



