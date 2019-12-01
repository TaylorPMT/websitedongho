@php
    use App\Models\Topic;
    use App\Library\Library_my;
    use App\Models\Post;
    use Illuminate\Support\Str;
    $Topic_all=Topic::where(['status'=>1])->get();
    $news_id=Library_my::newsid($Topic_all,$idtopic,[$idtopic]);
    $Post=Post::where(['status'=>1])->whereIn('topid',$news_id)->orderBy('created_at')->take(8)->get();
   
@endphp

<div class="row products_category ">

            @foreach ($Post as $item)
            <div class="col-md-3 my-3">
                <div class="products-category">
                    <div class="card">
                            <p class="card-title">{{ $item->title }}</p>
                        <a href={{ url('page/tin-tuc/'.$item->slug)}}>
                            <img src="{{ asset('img/news/'.$item->img)  }}" class="card-img-top" alt="...">
                        </a>
                            <div class="card-body">
                                    <a href={{ url('page/tin-tuc/'.$item->slug)}}>
                                        <h5 class="card-text">{{ Str::limit($item->detail, 100, '.....') }}</h5>
                                    </a>
                                    
                                <h5 class="card-price"></h5>
                               
                                <a href={{ url('page/tin-tuc/'.$item->slug)}} class="form-control btn btn-primary">Xem Thêm -></a>
                            </div>
                            </div>
                        </div>
                    </div>



            @endforeach
</div>
{{--  <!!--end--products-->  --}}
