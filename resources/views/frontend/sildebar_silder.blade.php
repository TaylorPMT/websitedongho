@php
    use App\Models\Silder;
    $list_silder=Silder::where(['status'=>1,'position'=>'silder'])->orderBy('order','asc')->get();
@endphp
    @if (count($list_silder))
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
                @foreach ($list_silder as $item)
                {{--  <!!--The Loop Variable
                When looping, a $loop variable will be available inside of your loop. This variable provides access to some useful bits of information such as the current loop index and whether this is the first or last iteration through the loop:-->  --}}
                    @if ($loop->first)

                        <div class="carousel-item active">
                                <img src="{{ asset('img/banner/'.$item->img) }}" class="d-block w-100" alt="{{$item->name }}">
                        </div>
                    @else
                        <div class="carousel-item">
                                <img src="{{ asset('img/banner/'.$item->img)}}" class="d-block w-100" alt="{{$item->name }}">
                        </div>
                    @endif
                @endforeach



        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    @endif

