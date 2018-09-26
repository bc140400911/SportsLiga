@extends('layouts.tournament')
@section('score-info')
    <!-- Section Title -->
    <div class="section-title single-result" style="background:url({{asset('assets/frontend/images/locations/3.jpg')}}">
        <div class="container">
            <div class="row">
                <!-- Result Location -->
                <div class="col-lg-12">
                    <div class="result-location">
                        <ul>
                            <li>
                                {{$matchInfo->date}}
                            </li>

                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{$stadiumInfo->name}}
                            </li>
                            <li>Att: 80,000</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Result Location -->

            <!-- Result -->
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <div class="team">
                        {{--<img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="club-logo">--}}
                        <a href="single-team.html">{{getTeamName($matchInfo->first_team)}}</a>
                        <ul>
                            @foreach($homeGoal as $goalHome)
                            <li class="card-result top red">{{$goalHome->player_name}} {{$goalHome->min}} <i class="fa fa-futbol-o" aria-hidden="true"></i></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-lg-2">
                    <div class="result-match">
                        {{$scoreboard->team_one_score}} : {{$scoreboard->team_two_score}}
                    </div>

                    <div class="live-on">
                            <a href="#">
                                Live on
                                <img src="{{asset('assets/frontend/images/img-theme/espn.gif')}}" alt="">
                            </a>
                    </div>
                    <div class="live-on">
                           Match Result</br>
                            <h5>{{$scoreboard->result}}</h5>
                    </div>
                </div>

                <div class="col-md-5 col-lg-5">
                    <div class="team right">
                        <a href="single-team.html">{{getTeamName($matchInfo->second_team)}}</a>
{{--                        <img src="{{asset('assets/frontend/images/clubs-logos/arg.png')}}" alt="club-logo">--}}
                        <ul>
                            @foreach($awayGoal as $goalAway)
                                <li>{{$goalAway->player_name}} {{$goalAway->min}} <i class="fa fa-futbol-o" aria-hidden="true"></i></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Result -->

            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="timeline-result">--}}
                        {{--<div class="team-timeline">--}}
{{--                            <img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="club-logo">--}}
                            {{--<a href="single-team.html">{{$matchInfo->first_team}}</a>--}}
                        {{--</div>--}}
                        {{--<ul class="timeline">--}}
                            {{--@foreach($Cards as $home)--}}
                            {{--<li class="card-result bottom goal" style="left:{{$home->id}}%" data-placement="top" data-trigger="hover" data-toggle="popover" title="{{$home->card_type}}" data-content="{{$home->min}} {{$home->player_name}}">--}}
                                {{--{{$home->min}}--}}
                            {{--</li>--}}
                            {{--@endforeach--}}

                        {{--</ul>--}}
                        {{--<div class="team-timeline">--}}
{{--                            <img src="{{asset('assets/frontend/images/clubs-logos/arg.png')}}" alt="club-logo">--}}
                            {{--<a href="single-team.html">{{$matchInfo->second_team}}</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
    </div>
    <!-- End Section Title -->

    <!-- Section Area - Content Central -->
    <div class="content-info">

        <!-- Single Team Tabs -->
        <div class="single-team-tabs">
            <div class="container">
                <div class="row">
                    <!-- Left Content - Tabs and Carousel -->
                    <div class="col-xl-12 col-md-12">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#summary" data-toggle="tab">Summary</a></li>
                            <li><a href="#stats" data-toggle="tab">Mach Stats</a></li>
                        </ul>
                        <!-- End Nav Tabs -->
                    </div>

                    <div class="col-lg-12">
                        <!-- Content Tabs -->
                        <div class="tab-content">
                            <!-- Tab One - Sumary -->
                            <div class="tab-pane active" id="summary">

                                <div class="panel-box padding-b">
                                    <div class="titles">
                                        <h4>Match Summary</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-4">
                                            <img src="{{asset('team')}}" alt="">
                                        </div>

                                        <div class="col-lg-12 col-xl-8">
                                            <p>The Colombia national football team (Spanish: Selección de fútbol de Colombia) represents Colombia in international football competitions and is overseen by the Colombian Football Federation. It is a member of the CONMEBOL and is currently ranked thirteenth in the FIFA World Rankings.[3] The team are nicknamed Los Cafeteros due to the coffee production in their country.</p>

                                            <p>Since the mid-1980s, the national team has been a symbol fighting the country's negative reputation. This has made the sport popular and made the national team a sign of nationalism, pride and passion for many Colombians worldwide.</p>

                                            <p> It is a member of the CONMEBOL and is currently ranked thirteenth in the FIFA World Rankings.[3] The team are nicknamed Los Cafeteros due to the coffee production in their country</p>
                                        </div>
                                    </div>
                                </div>

                                <!--Items Club News -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="clear-title">Match News</h3>
                                    </div>

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">World football's dates.</a></h4>
                                            </div>
                                            <a href="#"><img src="{{asset('assets/frontend/images/blog/1.jpg')}}" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Fans from all around the world can apply for 2018 FIFA World Cup™ tickets as the first window of sales.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Mbappe’s year to remember</a></h4>
                                            </div>
                                            <a href="#"><img src="{{asset('assets/frontend/images/blog/2.jpg')}}" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Tickets may be purchased online by using Visa payment cards or Visa Checkout. Visa is the official.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Egypt are one family</a></h4>
                                            </div>
                                            <a href="#"><img src="{{asset('assets/frontend/images/blog/3.jpg')}}" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Successful applicants who have applied for supporter tickets and conditional supporter tickets will.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-3">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Egypt are one family</a></h4>
                                            </div>
                                            <a href="#"><img src="{{asset('assets/frontend/images/blog/4.jpg')}}" alt=""></a>
                                            <div class="row">
                                                <div class="info-panel">
                                                    <p>Successful applicants who have applied for supporter tickets and conditional supporter tickets will.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                </div>
                                <!--End Items Club News -->


                                <!--Items Club video -->
                                <div class="row no-line-height">
                                    <div class="col-md-12">
                                        <h3 class="clear-title">Match Videos</h3>
                                    </div>

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-4">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Eliminatory to the world.</a></h4>
                                            </div>
                                            <iframe class="video" src="https://www.youtube.com/embed/Ln8rXkeeyP0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-4">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Colombia classification</a></h4>
                                            </div>
                                            <iframe class="video" src="https://www.youtube.com/embed/Z5cackyUfgk" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-4">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">World Cup goal</a></h4>
                                            </div>
                                            <iframe class="video" src="https://www.youtube.com/embed/hW3hnUoUS0k" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->
                                </div>
                                <!--End Items Club video -->

                                <!--Sponsors CLub -->
                                <div class="row no-line-height">
                                    <div class="col-md-12">
                                        <h3 class="clear-title">Match Sponsors</h3>
                                    </div>
                                </div>
                                <!--End Sponsors CLub -->

                                <ul class="sponsors-carousel">
                                    <li><a href="#"><img src="{{asset('assets/frontend/images/sponsors/1.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('assets/frontend/images/sponsors/2.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('assets/frontend/images/sponsors/3.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('assets/frontend/images/sponsors/4.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('assets/frontend/images/sponsors/5.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('assets/frontend/images/sponsors/3.png')}}" alt=""></a></li>
                                </ul>

                            </div>
                            <!-- Tab One - Sumary -->

                            <!-- Tab Two - stats -->
                            <div class="tab-pane" id="stats">
                                <!-- Result -->
                                <div class="row match-stats">
                                    <div class="col-lg-5">
                                        <div class="team boldtext">
{{--                                            <img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="club-logo">--}}
                                            <a href="single-team.html">{{getTeamName($matchInfo->first_team)}}</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="result-match">
                                            VS
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="team right boldtext">
                                            <a href="single-team.html">{{getTeamName($matchInfo->second_team)}}</a>
{{--                                            <img src="{{asset('assets/frontend/images/clubs-logos/arg.png')}}" alt="club-logo">--}}
                                        </div>
                                    </div>

                                    {{--<div class="col-lg-12">--}}
                                        {{--<div class="result-match">--}}
                                            {{--Cards--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-lg-5">--}}
                                        {{--<div class="team">--}}
                                            {{--                                            <img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="club-logo">--}}
                                            {{--@foreach($homeCard as $home) <ul><h5>Card Type:  {{$home->card_type}}</h5><h5>Card Time:  {{$home->min}}</h5><h5>Card Player: {{$home->player_name}}</h5></ul>@endforeach--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-lg-2">--}}
                                        {{--<div class="result-match">--}}
                                            {{--Cards--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-lg-5">--}}
                                        {{--<div class="team right">--}}
                                            {{--@foreach($awayCard as $away) <ul><h5>Card Type:  {{$away->card_type}}</h5><h5>Card Time:  {{$away->min}}</h5><h5>Card Player: {{$away->player_name}}</h5></ul>@endforeach--}}
                                            {{--                                            <img src="{{asset('assets/frontend/images/clubs-logos/arg.png')}}" alt="club-logo">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}



                                    {{--<div class="col-lg-5">--}}
                                        {{--<div class="team">--}}
                                            {{--                                            <img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="club-logo">--}}
                                            {{--@foreach($homeGoal as $home) <ul><h5>Goal Player:  {{$home->player_name}}</h5><h5>Goal Time:  {{$home->min}}</h5></ul>@endforeach--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-lg-2">--}}
                                        {{--<div class="result-match">--}}
                                            {{--Goals--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-lg-5">--}}
                                        {{--<div class="team right">--}}
                                            {{--@foreach($awayGoal as $away) <ul><h5>Goal Player:  {{$away->player_name}}</h5><h5>Goal Time:  {{$away->min}}</h5></ul>@endforeach--}}
                                            {{--                                            <img src="{{asset('assets/frontend/images/clubs-logos/arg.png')}}" alt="club-logo">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}



                                    <div class="col-lg-12">
                                        <ul>
                                            {{--@foreach($Cards as $cards)--}}

                                                    {{--@foreach($homeCard as $cardsHome)--}}
                                                    {{--<span class="left"><li>{{$cardsHome->min}}</li><li>{{$cardsHome->player_name}}</li><li>{{$cardsHome->card_type}}</li></span>--}}
                                                    {{--@endforeach--}}

                                                {{--<span class="center">Cards</span>--}}
                                                        {{--@foreach($awayCard as $cardsAway)--}}
                                                    {{--<span class="right"><li>{{$cardsAway->min}}</li><li>{{$cardsAway->player_name}}</li><li>{{$cardsAway->card_type}}</li></span>--}}
                                                        {{--@endforeach--}}

                                            {{--@endforeach--}}

                                            {{--<li>--}}
                                                {{--@foreach($awayGoal as $away)<span class="left">{{$away->player_name}}{{$away->min}}</span> @endforeach--}}
                                                {{--<span class="center">Goal Player</span>--}}
                                                {{--@foreach($awayGoal as $away)<span class="left">{{$away->player_name}}{{$away->min}}</span> @endforeach--}}
                                            {{--</li>--}}

                                            {{--<div class="col-lg-12">--}}
                                                {{--<div class="result-match">--}}
                                                    {{--Cards--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <li>
                                                <div class="result-match">
                                                    Cards
                                                </div>
                                            </li>
                                            <li>
                                                <span class="col-lg-4.5">@foreach($homeCard as $home){{$home->player_name}}  {{$home->min}} {{$home->card_type}} <br>@endforeach</span>
                                                <span class="col-lg-4.5"></span>
                                                <span class="col-lg-3">@foreach($awayCard as $away){{$away->player_name}}  {{$away->min}} {{$away->card_type}} <br>@endforeach</span>
                                            </li>
                                            <li>
                                                <div class="result-match">
                                                    Goals
                                                </div>
                                            </li>
                                            <li>
                                                <span class="col-lg-5.5">@foreach($homeGoal as $home){{$home->player_name}}  {{$home->min}} <br>@endforeach</span>
                                                <span class="col-lg-4.5"></span>
                                                <span class="col-lg-3">@foreach($awayGoal as $away){{$away->player_name}}  {{$away->min}} <br>@endforeach</span>
                                            </li>

                                            {{--<li>--}}
                                                {{--<span class="left">58.5</span>--}}
                                                {{--<span class="center">Shots On Target</span>--}}
                                                {{--<span class="right">40</span>--}}
                                            {{--</li>--}}

                                            {{--<li>--}}
                                                {{--<span class="left">58.5</span>--}}
                                                {{--<span class="center">Shots</span>--}}
                                                {{--<span class="right">40</span>--}}
                                            {{--</li>--}}

                                            {{--<li>--}}
                                                {{--<span class="left">58.5</span>--}}
                                                {{--<span class="center">Touches</span>--}}
                                                {{--<span class="right">40</span>--}}
                                            {{--</li>--}}

                                            {{--<li>--}}
                                                {{--<span class="left">58.5</span>--}}
                                                {{--<span class="center">Passes</span>--}}
                                                {{--<span class="right">40</span>--}}
                                            {{--</li>--}}

                                            {{--<li>--}}
                                                {{--<span class="left">58.5</span>--}}
                                                {{--<span class="center">Tackles</span>--}}
                                                {{--<span class="right">40</span>--}}
                                            {{--</li>--}}

                                            {{--<li>--}}
                                                {{--<span class="left">58.5</span>--}}
                                                {{--<span class="center">Clearances</span>--}}
                                                {{--<span class="right">40</span>--}}
                                            {{--</li>--}}
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Result -->
                            </div>
                            <!-- End Tab Two - stats -->
                        </div>
                        <!-- Content Tabs -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Single Team Tabs -->

        <!-- Newsletter -->
        <!-- Newsletter -->
        <div class="panel-box">
            <!-- Title Post -->
            <div class="titles" id="">
                <h4 >Comments</h4>
            </div>

            <ul class="testimonials">

            @foreach($matchInfo->comment as $comment)


                <!-- Title Post -->


                    <li id="comment{{$comment->id}}">
                        <blockquote><p class="edit">  {{$comment->text}}!
                                @if(Auth::user() && Auth::user()->id == $comment->user_id)
                                    <i class="fa fa-edit editing" style="float:right; margin-left: 18px;"  data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-id="{{$comment->id}}" data-text="{{$comment->text}}" ></i><i class="fa fa-trash-o  delettion" style="float: right " data-id="{{$comment->id}}" ></i></p>
                            @endif
                        </blockquote>
                        {{--<img src="{{asset('assets/frontend/images/testimonials/1.jpg')}}" alt="">--}}

                    </li>






                    <!-- End Comments -->
                    <div class="modal fade mymodal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="update_comments">
                                        <div class="form-group">
                                            @if(Auth::user())
                                                <label for="recipient-name" class="col-form-label">{{Auth::user()->first_name}}:</label>

                                                <input type="hidden" class="form-control" id="user_id" value="{{Auth::user()->id }}">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token">

                                                <input type="hidden" class="form-control" id="comment_id" data-id="{{$comment->id}}">

                                                <input type="hidden" class="form-control" id="match_id" value="{{$comment->match_id}}">
                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" id="message-text" value="">   </textarea>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="update">update</button>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                {{--//--}}


                {{--//--}}

            @endforeach  <!-- Comment Form -->
            </ul>
            <div class="panel-box padding-b">
                <!-- Title Post -->
                {{--<div class="titles">--}}
                    {{--<h4>Publish Commnet</h4>--}}
                    {{--<div> <ul class="testimonials" id="commented">--}}

                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="info-panel">
                    <!-- Form coment -->

                    <form class="form-theme" id="comments">
                        @if(Auth()->user() != null)



                            <div class="row">
                                <div class="col-md-12">
                                    <label>Comment</label>
                                    <textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment" style="height: 138px;" required="required"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token">
                                        <input type="hidden" value="{{Auth::user()->id }}" id="user_id">
                                        @foreach($matchInfo->comment as $com)
                                        <input type="hidden" value="{{$com->comment_id}}">
                                         @endforeach
                                        <input type="hidden" value="{{$matchInfo->id}}" id="match_id">

                                        <input type="submit" value="Post Comment"  class="btn btn-primary">
                                    </div>
                                </div>
                            </div>

                    </form>
                    <!-- End Form coment -->
                </div>
            </div>

        </div>
    </div>
    {{--unlog user--}}

    @endif

    @foreach($matchInfo->comment as $comment)
        @if(Auth()->user() == null )
            <div>
                <ul class="testimonials">
                    <li>
                        <blockquote>
                            <p>
                                {{$comment->text}}

                            </p>
                        </blockquote>
                    </li>
                </ul>
            </div>

        @endif
    @endforeach
    @if(Auth()->user() == null )
        <form class="form-theme">
            <div class="row">
                <div class="col-md-12">
                    <label>Comment</label>
                    <textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment" style="height: 138px;" required="required"></textarea>

                </div>
                <div class="col-md-12">
                    <a   href= "{{route('login')}}" class="btn btn-primary">Add Comments</a>
                </div>
            </div>

        </form>
    @endif
@stop