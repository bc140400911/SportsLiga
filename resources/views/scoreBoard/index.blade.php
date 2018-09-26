@extends('layouts.tournament')
@section('score-board')
    <div class="section-title" style="background:url({{asset('assets/frontend/images/slide/1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Points Table</h1>
                </div>

                <div class="col-md-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Scoreboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section Title -->

    <!-- Section Area - Content Central -->
    <section class="content-info">

        <div class="container padding-top">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="teamscore">Select list (select one):</label>
                        <select class="form-control" id="teamscore">
                            <?php $i = 23;?>
                            @foreach($team as $teams)
                                <option value="{{$teams->id}}">{{$teams->id}}- {{$teams->name}}</option>
                                <?php $i--; ?>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="recent-results results-page">
                        <div class="info-results">


                            {{--<ul>--}}
                                {{--@for($i=0; $i<count($score) ;$i++)--}}
                                    {{--<li>--}}
                                            {{--<span class="head">--}}
                                               {{--{{getTeamName($match[$i]->first_team)}} vs {{getTeamName($match[$i]->second_team)}}--}}
                                                {{--<span class="date">--}}
                                               {{--{{$match[$i]->date}}--}}
                                            {{--</span>--}}
                                            {{--</span>--}}
                                {{--@endfor--}}
                            <ul class="scoredata">
                                {{--@for($i=0; $i<count($score) ;$i++)--}}
                                    {{--<li>--}}
                                            {{--<span class="head">--}}
                                               {{--{{getTeamName($match[$i]->first_team)}} vs {{getTeamName($match[$i]->second_team)}}--}}
                                                {{--<span class="date">--}}
                                               {{--{{$match[$i]->date}}--}}
                                            {{--</span>--}}
                                            {{--</span>--}}


                                        {{--<div class="goals-result">--}}
                                            {{--<a href="{{route('score-info',['tournamentId' => $tournament->id ,'id'=>$score[$i]])}}">--}}
                                                {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}"  alt="">--}}
                                                {{--{{getTeamName($match[$i]->first_team)}}--}}
                                            {{--</a>--}}

                                            {{--<span class="goals">--}}
                                                    {{--<b>{{$score[$i]->team_one_score}}</b> - <b>{{$score[$i]->team_two_score}}</b>--}}
                                                    {{--<a href="{{route('score-info',['tournamentId' => $tournament->id ,'id'=>$score[$i]])}}" class="btn theme">View More</a>--}}
                                                {{--</span>--}}

                                            {{--<a href="{{route('score-info',['tournamentId' => $tournament->id ,'id'=>$score[$i]])}}">--}}
                                                {{--<img src="{{asset('assets/frontend/images/clubs-logos/esp.png')}}" alt="">--}}
                                                {{--{{getTeamName($match[$i]->second_team)}}--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--@endfor--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->

    </section>
    <!-- End Section Area -  Content Central -->
@stop