@extends('layouts.admin')

@section('dashboard_title')
    Comments
@endsection
@section('site_stats')
    <div class="row">
        <div class="col-md-12">

            <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                <h5 class="card-header">
                    Admins
                </h5>
                <table id="sport-table" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Comments</th>
                        <th>Creat Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->user->first_name}}</td>
                                <td>{{$comment->text}}</td>
                                <td>{{$comment->created_at}}</td>
                                <td ><i class="la la-trash-o trash" data-id="{{$comment->id}}" ></i></td>

                            </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection








