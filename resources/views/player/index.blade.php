@extends('layouts.tournament')
@section('player-list')
<div class="section-title" style="background:url('{{asset('assets/frontend/images/slide/1.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Players List</h1>
            </div>

            <div class="col-md-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li>Players</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content-info">

    <!-- Nav Filters -->
    <div class="portfolioFilter">
        <div class="container">
            <h5><i class="fa fa-filter" aria-hidden="true"></i>Filter By:</h5>
            <a href="#" data-filter=".1" class="current">Alaves</a>
            <a href="#" data-filter=".2">Ath Bilbao</a>
            <a href="#" data-filter=".3">Ath Madrid</a>
            <a href="#" data-filter=".4">Barcelona</a>
            <a href="#" data-filter=".5">Betis</a>
            <a href="#" data-filter=".6">Celta Vigo</a>
            <a href="#" data-filter=".7">Eibar</a>
            <a href="#" data-filter=".8">Espanol</a>
            <a href="#" data-filter=".9">Getafe</a>
            <a href="#" data-filter=".10">Girona</a>
            <a href="#" data-filter=".11">La Coruna</a>
            <a href="#" data-filter=".12">Las Palmas</a>
            <a href="#" data-filter=".13">Leganes</a>
            <a href="#" data-filter=".14">Levante</a>
            <a href="#" data-filter=".15">Malaga</a>
            <a href="#" data-filter=".16">Real Madrid</a>
            <a href="#" data-filter=".17">Sevilla</a>
            <a href="#" data-filter=".18">Sociedad</a>
            <a href="#" data-filter=".19">Valencia</a>
            <a href="#" data-filter=".20">Villarreal</a>
        </div>
    </div>
    <!-- End Nav Filters -->

    <div class="container padding-top">
        <div class="row portfolioContainer" style="position: relative; height: 1490.53px;">


        @foreach( $data as $player)
            <!-- Item Player -->
            <div class="col-xl-3 col-lg-4 col-md-6 {{$player->team_id}}" style="position: absolute;">
                <div class="item-player">
                    <div class="head-player">
                        <img src="{{$player->thumb_pic}}" alt="location-team">
                        <div class="overlay"><a href="{{route('player-info',[$player->id])}}">+</a></div>
                    </div>
                    <div class="info-player">
                                    <span class="number-player">
                                        {{$player->id}}
                                    </span>
                        <h4>
                            {{$player->name}}
                            <span>{{$player->position}}</span>
                        </h4>
                        <ul>
                            <li>
                                <strong>NATIONALITY</strong> <span> {{$player->nationality}} </span>
                            </li><li><strong>Team:</strong> <span>{{$player->team_name}}</span></li>
                            <li><strong>DOB:</strong> <span>{{$player->date_of_birth}}</span></li>
                        </ul>
                    </div>
                    {{--{{route('update.post',[$post->id])}}--}}
                    <a href="{{route('player-info',[$player->id])}}" class="btn">View Player <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- End Item Player -->
        @endforeach
        </div>
    </div>
    <!-- End Newsletter -->
</section>
@stop

