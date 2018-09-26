@extends('layouts.tournament')
@section('live.score')
    @if($livescores != null && $livescores['Match'][0]['League'] == 'La Liga')
        @foreach($livescores['Match'] as $livescore)
            <div class="section-title single-result" style="background:url({{asset('assets/frontend/images/locations/3.jpg')}})">
                <div class="container">
                    <div class="row">
                        <!-- Result Location -->
                        <div class="col-lg-12">
                            <div class="result-location">
                                <ul>
                                    <li>
                                        {{$livescore['Date']}}
                                    </li>

                                    <li>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{$livescore['Stadium']}}
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

                                <a href="#">{{$livescore['HomeTeam']}}</a>
                                <ul>
                                    @if($livescore['HomeTeamYellowCardDetails'] != null)
                                        <li>{{$livescore['HomeTeamYellowCardDetails']}} <i class="fa fa-futbol-o" aria-hidden="true"></i></li>

                                    @else
                                        <li>N/A<i class="fa fa-futbol-o" aria-hidden="true"></i></li>

                                    @endif
                                    @if($livescore['HomeTeamYellowCardDetails'] !=null)

                                        <li>{{$livescore['HomeTeamYellowCardDetails']}} <i class="fa fa-futbol-o" aria-hidden="true"></i></li>

                                    @else
                                        <li>N/A<i class="fa fa-futbol-o" aria-hidden="true"></i></li>

                                    @endif
                                    @if($livescore['HomeTeamYellowCardDetails'] !=null)

                                        <li>{{$livescore['HomeTeamYellowCardDetails']}} <i class="fa fa-futbol-o" aria-hidden="true"></i></li>

                                    @else
                                        <li>N/A<i class="fa fa-futbol-o" aria-hidden="true"></i></li>

                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2">
                            <div class="result-match">
                                {{$livescore['HomeGoals']}}    :    {{$livescore['AwayGoals']}}
                            </div>
                            <div class="live-on">
                                <a href="#">
                                    Live on
                                    SportsLiga
                                </a>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-5">
                            <div class="team right">

                                <a href="#">{{$livescore['AwayTeam']}}</a>
                                {{--<img src="img/clubs-logos/arg.png" alt="club-logo">--}}
                                <ul>
                                    @if($livescore['AwayTeamYellowCardDetails'] != null)

                                        <li><i class="fa fa-futbol-o" aria-hidden="true"></i> {{$livescore['AwayTeamYellowCardDetails']}} </li>


                                    @else
                                        <li><i class="fa fa-futbol-o" aria-hidden="true"></i> N/A </li>

                                    @endif
                                    @if($livescore['AwayTeamRedCardDetails'] != null)
                                        <li><i class="fa fa-futbol-o" aria-hidden="true"></i> {{$livescore['AwayTeamRedCardDetails']}} </li>

                                    @else

                                        <li><i class="fa fa-futbol-o" aria-hidden="true"></i>N/A</li>


                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @else
        <marquee style = color:red>No Live Match in This Time Pl Stay with us</marquee>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @for($i = 0; $i<count($youtube['items']); $i++)
                    <?php $link = $youtube['items'][$i]['id']['videoId'] ?>
                    <div>
                        <iframe width="300" height="500" src="https://www.youtube.com/embed/{{$link}}?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        @endfor
                        @endif
                    </div>
                    <div class="col-md-3"></div>
            </div>
        </div>
    @endsection