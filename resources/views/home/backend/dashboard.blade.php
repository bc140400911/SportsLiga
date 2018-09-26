@extends('layouts.admin')

@section('dashboard_title')
    Dashboard
    @endsection
@section('site_stats')

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <div class="card ks-widget-payment-simple-amount-item ks-green">
                <div class="payment-simple-amount-item-icon-block">
                    <span class="la la-leaf ks-icon"></span>
                </div>

                <div class="payment-simple-amount-item-body">
                    <div class="payment-simple-amount-item-amount">
                        <span class="ks-amount" id="sport-count">{{$sports->count()}}</span>
                        <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                    </div>
                    <div class="payment-simple-amount-item-description">
                        Total Sports(s) <span class="ks-progress-type"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
        <div class="card ks-widget-payment-simple-amount-item ks-green">
            <div class="payment-simple-amount-item-icon-block">
                <span class="la la-leaf ks-icon"></span>
            </div>

            <div class="payment-simple-amount-item-body">
                <div class="payment-simple-amount-item-amount">
                    <span class="ks-amount" id="std-count">{{$stadium->count()}}</span>
                    <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                </div>
                <div class="payment-simple-amount-item-description">
                    Total Stadium(s) <span class="ks-progress-type"></span>
                </div>
            </div>
        </div>
    </div>

        <div class="col-lg-2 col-md-2">
            <div class="card ks-widget-payment-simple-amount-item ks-purple">
                <div class="payment-simple-amount-item-icon-block">
                    <span class="ks-icon-user ks-icon"></span>
                </div>

                <div class="payment-simple-amount-item-body">
                    <div class="payment-simple-amount-item-amount">
                        <span class="ks-amount" id="user-count">{{$users->count()}}</span>
                        <span class="ks-amount-icon ks-icon-circled-down-left"></span>
                    </div>
                    <div class="payment-simple-amount-item-description">
                        Total User(s) <span class="ks-progress-type"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="card ks-widget-payment-simple-amount-item ks-green">
                <div class="payment-simple-amount-item-icon-block">
                    <span class="la la-pie-chart ks-icon"></span>
                </div>

                <div class="payment-simple-amount-item-body">
                    <div class="payment-simple-amount-item-amount">

                        <span class="ks-amount"></span>

                        <span class="ks-amount" id="team-count">{{$teams->count()}}</span>
                        <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                    </div>
                    <div class="payment-simple-amount-item-description">
                        Total Teams <span class="ks-progress-type"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            {{--class="card ks-widget-payment-simple-amount-item ks-orange"--}}
            <div class="card ks-widget-payment-simple-amount-item ks-orange">
                <div class="payment-simple-amount-item-icon-block">
                    <span class="la la-area-chart ks-icon"></span>
                </div>

                <div class="payment-simple-amount-item-body">
                    <div class="payment-simple-amount-item-amount">
                        <span class="ks-amount"  id="players-count">{{$players->count()}}</span>
                        <span class="ks-amount-icon ks-icon-circled-up-right"></span>
                    </div>
                    <div class="payment-simple-amount-item-description">
                        Total Players <span class="ks-progress-type"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="card ks-widget-payment-simple-amount-item ks-pink">
                <div class="payment-simple-amount-item-icon-block">
                    <span class="ks-icon-user ks-icon"></span>
                </div>

                <div class="payment-simple-amount-item-body">
                    <div class="payment-simple-amount-item-amount">
                        <span class="ks-amount" id="comments-count">{{$comments->count()}}</span>
                        <span class="ks-amount-icon ks-icon-circled-down-left"></span>
                    </div>
                    <div class="payment-simple-amount-item-description">
                        Total Comments <span class="ks-progress-type"></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('Admins_section')
    <div class="row">
        <div class="col-md-6">

            <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                <h5 class="card-header">
                    Sports
                </h5>
            <table id="sport-table" class="table table-striped table-bordered" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Added Date</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($sports as $sport)
                        <tr>
                            <td>{{$sport->id}}</td>
                            <td>{{$sport->name}}</td>
                            <td>{{$sport->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <div class="col-md-6">

            <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                <h5 class="card-header">
                    Tournaments
                </h5>
                <table id="tournament-table" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Sport</th>
                        <th>Favorites</th>
                        <th>Added Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tournaments as $tournament)
                        <tr>
                            <td>{{$tournament->id}}</td>
                            <td>{{$tournament->name}}</td>
                            <td>{{$tournament->sport->name}}</td>
                            <td>{{$tournament->favorite->count()}}</td>
                            <td>{{$tournament->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection