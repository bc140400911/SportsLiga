@extends('layouts.admin')

@section('dashboard_title')
    Teams
@endsection
@section('site_stats')
    <div class="row">
        <div class="col-md-12">

            <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                <h5 class="card-header">
                    All Teams
                </h5>
                <table id="teams-table" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>badge</th>
                        <th>Name</th>
                        <th>Manager</th>
                        <th>tournament Name</th>
                        <th>favorite</th>
                        <th>Total players</th>
                        <th>Establish Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                            <tr>
                                <td>{{$team->id}}</td>
                                @foreach($team->image as $image)
                                    @if($image->type == 'badge')
                                        <td class="text-center"><img src="{{$image->image}}"  width="30px" alt="team-badge"></td>
                                    @endif
                                @endforeach

                                <td>{{$team->name}}</td>
                                <td>{{$team->manager}}</td>
                                <td>{{$team->tournament->name}}</td>
                                <td>{{count($team->favorite)}}</td>
                                <td>{{count($team->player)}}</td>
                                <td>{{$team->establish_at}}</td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('Admins_section')

@endsection