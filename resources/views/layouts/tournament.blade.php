@extends('layouts.main')
@section('tournament')
    @include('includes.frontend.sub-header')
    <!--- sections -->
    @yield('tournament-home')
    @yield('tournament-news')
    @yield('single-tournament')
    @yield('score-board')
    @yield('team-list')
    @yield('single-team')
    @yield('standings')
    @yield('schedule')
    @yield('player-list')
    @yield('player-info')
    @yield('score-info')
    @yield('news-detail')
    @yield('live.score')

@stop
