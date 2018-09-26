
<header>
    <!-- End headerbox-->
    <div class="headerbox">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <!-- Logo-->
                <div class="col">
                    <div class="logo">
                        <a href="{{route('home')}}" title="Return Home">
                            <img src="{{asset('assets/frontend/images/SportsLiga-logo.gif')}}" alt="Logo" class="logo_img">
                        </a>
                    </div>
                </div>
                <!-- End Logo-->

                <!-- Adds Header-->

                <div class="col">
                    <div class="adds">
                        {{--<a href="#" target="_blank">--}}
                            {{--<img src="{{asset('assets/frontend/images/adds/banner.jpg')}}" alt="" class="img-responsive">--}}
                        {{--</a>--}}
                    </div>
                    <a class="mobile-nav" href="#mobile-nav"><i class="fa fa-bars"></i></a>
                    <!-- End Call Nav Menu-->
                </div>
                <!-- End Adds Header-->
            </div>
        </div>
    </div>
    <!-- End headerbox-->
</header>
<!-- End Header-->
<!-- mainmenu-->
<nav class="mainmenu">
    <div class="container">
        <!-- Menu-->
        <ul class="sf-menu" id="menu">
            <li class="current">
                <a href="{{route('home')}}">Home</a>
            </li>

            @foreach($sports as $sport)

                <li class="current">
                    <a href="#" class="sf-with-ul">{{$sport->name}} &nbsp <i class="fa fa-caret-down"></i> </a>
                    <ul class="sub-current" style="display: none;">
                        @foreach($sport->tournament as $tournament)
                            <li><a href="{{route('tournament.show',['id' => $tournament->id ])}}">{{$tournament->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach

            <ul class="sf-menu sf-js-enabled sf-arrows pull-right" id="menu">
                @guest
                <li class="current">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="current">
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @else
                    <li id="notification_li">
                        <span id="notification_count">{{count(auth()->user()->unreadNotifications)}}</span>
                        <a href="#" id="notificationLink">Notifications</a>
                        <div id="notificationContainer">
                            <div id="notificationTitle">Notifications</div>
                            <div id="notificationsBody" class="notifications">
                                <ul class="notifications">
                                    <input type="hidden" value="{{Auth::user()->id}}" id="notifications">
                                    <div class="scrollbar scrollbar-primary">
                                        @foreach(auth()->user()->notifications as $notification)
                                            <li class="notification-box force-overflow notify-list">
                                                <a onclick="location.href='http://127.0.0.1:8000/tournament/1/score-info/{{snake_case(class_basename($notification->data['scoreBoard']['match_id']))}}'">
                                                {{--<a href="{{ route("notification-show",$notification->id) }}">--}}
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                        <img src="{{asset('assets/frontend/images/tournament/badge-1.png')}}" class="w-50 rounded-circle">
                                                    </div>
                                                    <div class="col-lg-9 col-sm-9 col-9">
                                                        <strong class="text-info">{{snake_case(class_basename(getTeamName($notification->data['scoreBoard']['team_two'])))}} </strong>vs <strong class="text-info">{{snake_case(class_basename(getTeamName($notification->data['scoreBoard']['team_one'])))}}</strong>
                                                        <div>
                                                            {{snake_case(class_basename($notification->data['scoreBoard']['result']))}}
                                                        </div>
                                                        <small class="text-warning">{{$notification->created_at}}</small>
                                                    </div>
                                                </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                            <div id="notificationFooter"><a href="#">See All</a></div>
                        </div>

                    </li>
                    @if(Auth::user()->image == '')
                        <img src="https://ui-avatars.com/api/?rounded=true&size=50&name={{Auth::user()->first_name}}+{{Auth::user()->last_name}}">
                        @else
                        <img src="{{Auth::user()->image}}" width="60" height="60">
                        @endif

                    <li class="current">
                        <a href="#" class="sf-with-ul">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span></a>
                        <ul class="sub-current" style="display: none;">
                            <li>
                                <a href="{{ route('viewProfile',['id' =>Auth::user()->id]) }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('view-profile').submit();">
                                    {{ __('view Profile') }}
                                </a>

                                <form id="view-profile" action="{{ route('viewProfile',['id' =>Auth::user()->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
            </ul>

        </ul>
        <!-- End Menu-->
    </div>
</nav>
<!-- End mainmenu-->

<!-- Mobile Nav-->
<div id="mobile-nav">
    <!-- Menu-->
    <ul>

        <li class="current">
            <a href="{{route('home')}}">Home</a>
        </li>

        @foreach($sports as $sport)
                {{--<a class="sf-with-ul mm-next">{{$sport->name}} &nbsp </a>--}}
                <ul class="sub-current" >
                    @foreach($sport->tournament as $tournament)
                        <li ><a href="{{route('tournament.show',['id' => $tournament->id ])}}">{{$tournament->name}}</a></li>
                    @endforeach
                </ul>

        @endforeach
        <ul class="sf-menu sub mobile-menu" id="menu">
            <li class="current">
                <a href="{{route('news' ,['id' => $tournament->id ] )}}">News</a>
            </li>
            <li class="current">
                <a href="{{route('score-board',['id'=> $tournament->id])}}">Score Board </a>
            </li>

            <li class="current">
                <a href="{{route('team' ,['id'=> $tournament->id])}}">Teams</a>
            </li>
            <li class="current">
                <a href="{{route('schedule' ,['id' => $tournament->id])}}">Schedule</a>
            </li>
            <li class="current">
                <a href="{{route('standings' ,['id' => $tournament->id])}}">Standings</a>
            </li>
            <li class="current">
                <a href="{{route('liveScore' ,['id' => $tournament->id])}}">Live Score</a>
            </li>

        </ul>
        <ul class="sf-menu sf-js-enabled sf-arrows" id="menu">
            @guest
            <li class="current">
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="current">
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @else
                <li class="current">
                    <a href="results.html" class="sf-with-ul">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="sub-current" style="display: none;">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

                @endguest
        </ul>

    </ul>

    <!-- End Menu-->
</div>

