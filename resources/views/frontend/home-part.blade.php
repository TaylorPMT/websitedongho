@php
    use App\Models\Category;
    use App\Library\Library_my;
    use App\Models\Product;
    $category_all=Category::where(['status'=>1])->get();
    $list_catid=Library_my::category_listid($category_all,$catid,[$catid]);
    $product=Product::where(['status'=>1])->whereIn('catid',$list_catid)->orderBy('created_at')->take(8)->get();
@endphp
<div class="row products_category">

            @foreach ($product as $item)
            <div class="col-md-3">
                <div class="products-category">
                    <div class="card">
                        <a href="{{ url($item->slug) }}">
                            <img src="{{ asset('img/product/'.$item->img)  }}" class="card-img-top" alt="...">
                        </a>
                            <div class="card-body">
                                    <a href="{{ url($item->slug) }}">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                    </a>
                                <h5 class="card-price">{{ number_format($item->price) }}</h5>
                                <p class="card-text">mô tả</p>
                                <a href="#" class="form-control btn btn-primary">Đặt Mua</a>
                            </div>
                            </div>
                        </div>
                    </div>



            @endforeach
</div>
{{--  <!!--end--products-->  --}}
