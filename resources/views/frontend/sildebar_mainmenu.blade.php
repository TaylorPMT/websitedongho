@php
    use App\Models\Menu;
    $listmenu1=Menu::where(['parentid'=>0,'status'=>1])->orderBy('orders','asc')->get();
@endphp
{{--  <!--kiểm tra có danh sách menu trong db -->  --}}
@if (count($listmenu1))
<nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach ($listmenu1 as $menu1)
                    @php
                        $listmenu2 =Menu::where(['parentid'=>$menu1->id,'status'=>1])->orderBy('orders','asc')->get();

                    @endphp
                    {{--  <!!--Xử Lý Menu Cấp 2 -->  --}}
                    @if (count($listmenu2))
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ url($menu1->link) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $menu1->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    @foreach ($listmenu2 as $menu2)
                                    {{--  <!!--In ra Menu Cấp 2 dựa trên parentid-->  --}}
                                <a class="dropdown-item" href="{{url($menu2->link) }}">{{ $menu2->name }}<a>

                                     @endforeach

                            </div>
                    </li>
                    @else
                    <li class="nav-item">
                            <a class="nav-link" href="{{ $menu1->link }}">{{ $menu1->name }}</a>
                    </li>
                    @endif
            @endforeach

        </ul>

    </div>
  </nav>
@endif

