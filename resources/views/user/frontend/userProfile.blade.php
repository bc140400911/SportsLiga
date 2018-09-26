@extends('layouts.main')
@section('userProfile')
    <div class=" container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 user-profile-layout">
         @if(Auth::user()->image == '')
             <div class="row user-profile-img">
                 <div class="col-md-12">
             <img src="{{asset('assets/frontend/images/profilepic.jpg')}}" width="100" height="100" class="rounded-circle pull-left">
                 </div>
                 </div>
        @else
             <div class="row user-profile-img">
                 <div class="col-md-12">
            <img src="{{Auth::user()->image}}" width="100" height="100" class="rounded-circle pull-left"><br/>
             </div>
             </div>

                 @endif

        <br/>
             <hr/>

        <strong class="user-profile"> Full Name : </strong> <strong id="updated-name"> {{$user->first_name}} {{$user->last_name}}</strong>
        <button class="fa fa-edit edit-user-btn" title="Edit Name" style="float:right"  data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"></button><br/>
        <strong class="fa fa-envelope user-profile"> Email :</strong> <span class="ks-emails"> {{$user->email}}</span><br/>
       <hr/>
             <strong class="pull-right fa fa-heart user-profile"></strong>
             <strong class="fa fa-comments pull-left"></strong>
             <br/>
             <small class="pull-right">Favorites: {{count($user->favorite)}}</small>
             @php
             $count=0;
             foreach ($user->comment as $comment)
             {
             $count++;

             }


           echo "<small>".'Comments :'. $count."</small>"
             @endphp
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" style="position: fixed;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Your Name</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <div class="modal-body">


                        <label for="first-name" class="col-form-label">First Name:</label>
                        <input type="text" name="firstName" id="first-name" value="{{Auth::user()->first_name}}"><br/>
                        <label for="last-name" class="col-form-label">Last Name:</label>
                        <input type="text" name="lasttName" id="last-name" value="{{Auth::user()->last_name}}">
                        <input type="hidden" class="form-control" id="user-id" value="{{Auth::user()->id }}">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update-user-profile" data-dismiss="modal">update changes</button>
                </div>
            </div>
        </div>
    </div>
    @endsection