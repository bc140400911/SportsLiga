@extends('layouts.admin')

@section('dashboard_title')
    Users
@endsection
@section('site_stats')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-md-12">

            <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                <h5 class="card-header">
                    All Users
                </h5>
                <table id="users-table" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Register Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if($user->role != '1')
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td class="text-center">
                                @if($user->verify_status == 1)
                                    <span class="btn btn-primary">Verified</span>
                                    @else
                                    <span class="btn btn-danger">Not Verified</span>
                                    @endif
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>

                                <button class="btn btn-danger user-delete" data-id="{{$user->id}}"><i class="la la-trash"></i></button></td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('Admins_section')
    <div class="row">
        <div class="col-md-12">

            <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                <h5 class="card-header">
                    Admins
                </h5>
                <table id="admins-table" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Register Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if($user->role != '0')
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection