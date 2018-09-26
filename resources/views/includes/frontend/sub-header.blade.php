<nav class="mainmenu sub-header">
    <div class="container">
        <!-- Menu-->
        {{--{{dd($tournament->id)}}--}}
        <ul class="sf-menu sub" id="menu">
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
        <!-- End Menu-->
    </div>
</nav>
