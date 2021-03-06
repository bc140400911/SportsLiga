@extends('layouts.admin')
@section('dashboard_title')
    Admin Profile
@stop
@section('admin_stats')

    <div class="ks-page-content-body ks-profile">
        <div class="ks-header">
            <div class="ks-user">
                <img src="{{asset('assets/backend/images/avatars/ava-1.png')}}" class="ks-avatar" width="100" height="100">
                <div class="ks-info">
                    <div class="ks-name">{{ Auth::user()->first_name }}</div>
                    <div class="ks-description">New York, USA</div>
                    <div class="ks-rating">
                        <i class="la la-star ks-star" aria-hidden="true"></i>
                        <i class="la la-star ks-star" aria-hidden="true"></i>
                        <i class="la la-star ks-star" aria-hidden="true"></i>
                        <i class="la la-star ks-star" aria-hidden="true"></i>
                        <i class="la la-star-half-o ks-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="ks-statistics">
                <div class="ks-item">
                    <div class="ks-amount">{{$admins->count()}}</div>
                    <div class="ks-text">Total Admins</div>
                </div>
            </div>
        </div>
        <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator ks-full ks-light">
            <ul class="nav ks-nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-toggle="tab" data-target="#overview" aria-expanded="true">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="tab" data-target="#settings" aria-expanded="false">Settings</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="false">
                    <div class="ks-settings-form-wrapper">
                        <form class="ks-form ks-settings-tab-form" action="{{route('update-admin-info')}}"> <!-- ks-uppercase ks-light -->
                            <h3 class="ks-form-main-header">Admin Info</h3>

                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}">
                                </div>
                                <div class="col-lg-4">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
                <div class="tab-pane" id="contacts" role="tabpanel" aria-expanded="false">

                </div>
                <div class="tab-pane" id="orders" role="tabpanel" aria-expanded="true">
                    Content 3
                </div>
                <div class="tab-pane" id="wish-list" role="tabpanel" aria-expanded="false">
                    Content 1
                </div>
                <div class="tab-pane" id="storecredit" role="tabpanel" aria-expanded="false">
                    Content 2
                </div>
                <div class="tab-pane" id="returns" role="tabpanel" aria-expanded="true">
                    Content 3
                </div>
                <div class="tab-pane" id="reward-points" role="tabpanel" aria-expanded="false">
                    Content 1
                </div>
                <div class="tab-pane" id="settings" role="tabpanel" aria-expanded="false">
                    <div class="ks-settings-form-wrapper">
                        <form class="ks-form ks-settings-tab-form ks-general"> <!-- ks-uppercase ks-light -->
                            <h3 class="ks-main-form-header">
                                General
                            </h3>

                            <div class="ks-manage-avatar ks-group">
                                <img class="ks-avatar" src="{{asset('assets/backend/images/avatars/ava-4.png')}}" width="100" height="100">
                                <div class="ks-manage-avatar-body">
                                    <div class="ks-manage-avatar-body-header">Your Avatar</div>
                                    <div class="ks-manage-avatar-body-description">
                                        A square image 100x100px is recommended
                                    </div>
                                    <div class="ks-manage-avatar-body-controls">
                                        <button type="button" class="btn btn-primary">
                                            <span class="la la-upload ks-icon"></span>
                                            <span class="ks-text">Upload Image</span>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary ks-light">Import from Gravatar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ks-form-group ks-linked-accounts">
                                <div class="ks-form-group-header">Link account with another member</div>
                                <div class="ks-linked-accounts-body">
                                    <span class="ks-linked-account">Your account linked with <span class="ks-linked-account-name">Alex Frolov</span> <img class="ks-avatar ks-linked-account-avatar" src="{{asset('assets/backend/images/avatars/ava-3.png')}}" width="24" height="24"></span>
                                    <a href="#">Unlink Account</a>
                                </div>
                            </div>
                            <div class="ks-form-group ks-connect-with-social-accounts">
                                <div class="ks-form-group-header">Connect with social accounts</div>
                                <div class="ks-connect-with-social-accounts-body">
                                    <div class="ks-connect-with">
                                        <button type="button" class="btn btn-danger">
                                            <span class="la la-google ks-icon"></span> <span class="ks-text">Connect with Google</span>
                                        </button>
                                    </div>
                                    <div class="ks-connect-with ks-connected">
                                        <button type="button" class="btn btn-outline-primary ks-light">
                                            <span class="la la-facebook ks-icon"></span>
                                            <span class="text ks-text">Connected as <span class="ks-name">Stephen Bates</span></span>
                                        </button>
                                        <a href="#">Disconnect</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
