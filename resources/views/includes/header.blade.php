<nav class="navbar navbar-expand-lg custom-nav">
    <div class="container-fluid">
        <a href="{{url('/')}}." class="navbar-brand"><img src="{{asset('front/img/logo.svg')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa-solid fa-sliders"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav custom-ul">
                <li class="nav-item custom-li">
                    <a href="{{url('/')}}" class="nav-link custom-link">Home</a>
                </li>
                <li class="nav-item custom-li">
                    <a href="{{url('about')}}" class="nav-link custom-link">about us</a>
                </li>
               
                <li class="nav-item dropdown custom-li">
                    <a class="nav-link dropdown-toggle custom-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu service-drop-down" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    @foreach($v_service as $service)
                                    @if($service->menu == 2)
                                    <li><a class="dropdown-item" href="{{url('product/'.$service->id)}}">{{$service->title}}</a></li>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    @foreach($v_service as $service)
                                    @if($service->menu == 1)
                                    <li><a class="dropdown-item" href="{{url('product/'.$service->id)}}">{{$service->title}}</a></li>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                </li>

                <li class="nav-item custom-li">
                    <a href="{{url('products')}}" class="nav-link custom-link">Products</a>
                </li>
                <li class="nav-item custom-li">
                    <a href="{{url('ads')}}" class="nav-link custom-link">ads</a>
                </li>
                <li class="nav-item custom-li">
                    <a href="{{url('blogs')}}" class="nav-link custom-link">blog</a>
                </li>
                <li class="nav-item custom-li">
                    <a href="{{url('contact')}}" class="nav-link custom-link">contact</a>
                </li>
                @if(session('user'))
                <li class="nav-item custom-li">
                    <a href="{{url('user/account')}}" class="nav-link custom-link">Account</a>
                </li>
                @endif
                <li class="nav-item custom-li " data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <a href="javascript::void(0);" class="nav-link custom-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Donation</a>
                </li>
            </ul>
            <span class="donation-url d-none">{{url('thanks')}}</span>
        </div>
    </div>
</nav>

