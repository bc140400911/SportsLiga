@extends('layouts.tournament')
@section('schedule')
    <!-- Section Title -->
    <div class="section-title" style="background:url({{asset('assets/frontend/images/slide/1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Fixtures</h1>
                </div>

                <div class="col-md-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Schedule</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section Title -->

    <!-- Section Area - Content Central -->
    <section class="content-info">

        <div class="container paddings-mini">
            <div class="row">

                <div class="col-lg-12">
                    <h3 class="clear-title">Matches</h3>
                </div>

                <div class="col-lg-12">
                    <table class="table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Team A</th>
                            <th class="text-center">VS</th>
                            <th>Team B</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($match as $m)
                            <tr>
                                <td>
                                    <strong>{{getTeamName($m->first_team)}}</strong><br>

                                    <small class="meta-text"></small>
                                </td>
                                <td class="text-center">Vs</td>
                                <td>

                                    <strong>{{getTeamName($m->second_team)}}</strong><br>
                                    <small class="meta-text"></small>
                                </td>
                                <td>
                                    Dated At : {{$m->start_date}} <small> Start Time : </small><strong>{{$m->start_time}}</strong> <br>
                                    <small class="meta-text"></small>
                                </td>
                                @endforeach
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--<div id="matchLink">--}}
            {{--{{ $match->links() }}--}}
        {{--</div>--}}
        <!-- Newsletter -->
        <div class="section-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2>Enter your e-mail and <span class="text-resalt">subscribe</span> to our newsletter.</h2>
                            <p>Duis non lorem porta,  eros sit amet, tempor sem. Donec nunc arcu, semper a tempus et, consequat.</p>
                        </div>
                        <form id="newsletterForm" action="http://html.iwthemes.com/sportscup/run/php/mailchip/newsletter-subscribe.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                        <input class="form-control" placeholder="Your Name" name="name"  type="text" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                        <input class="form-control" placeholder="Your  Email" name="email"  type="email" required="required">
                                        <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit" name="subscribe" >SIGN UP</button>
                                                 </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="result-newsletter"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Newsletter -->
    </section>
    <!-- End Section Area -  Content Central -->


@stop
