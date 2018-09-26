@extends('layouts.tournament')
@section('news-detail')
    <section class="content-info">

        <div class="container paddings-mini">
            <div class="row">

                <!-- Sidebars -->
                <aside class="col-lg-3">

                    <!-- End Widget Categories-->

                    <!-- Widget Text-->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Widget Text</h4>
                        </div>
                        <div class="info-panel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore.</p>
                        </div>
                    </div>
                    <!-- End Widget Text-->

                    <!-- Widget img-->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Widget Image</h4>
                        </div>
                        <img src="{{asset('assets/frontend/images/slide/1.jpg')}}" alt="">
                        <div class="row">
                            <div class="info-panel">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  ut sit amet, consectetur adipisicing elit, labore et dolore.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget img-->
                </aside>
                <!-- End Sidebars -->


                <div class="col-lg-9">
                    <!-- Content Text-->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Russia 2018’s potential classic match-ups</h4>
                        </div>
                        <img src="{{asset('assets/frontend/images/locations/1.jpg')}}" alt="">
                        <div class="info-panel">
                            <p>From the moment that the Final Draw for the 2018 FIFA World Cup Russia™ was made, fans around the globe have been poring over each of the groups and contemplating who might face who in the knockout rounds.</p>

                            <p>As they will no doubt have noticed there are some classic matches potentially in store from the Round of 16 onwards. Yet though the sport of football continues to develop at pace, it remains as unpredictable as ever. Anything can happen over the course of 90 minutes and nothing can be taken for granted in the group phase, where many a favourite has found themselves struggling just to make it through to the next round. For example, few would have tipped Costa Rica to advance from a Brazil 2014 pool also containing England, Italy and Uruguay. And yet Los Ticos progressed as group winners, while the English and Italians caught the first plane home.</p>

                            <p>To help fire your imagination and let you see if there is a potential knockout match you might be tempted to buy tickets for, FIFA.com has come up with a list of possible last-16 and quarter-final duels between some of the game’s biggest attractions. </p>

                            <h5>France-Argentina</h5>
                            <p>The top seeds in Groups C and D both have designs on winning their respective sections. But if one of them advances as a group winner and the other as a runner-up, then we will be seeing Lionel Messi facing off against Antoine Griezmann either in Kazan (30 June) or Nizhny Novgorod (1 July), depending on their team’s group placings. Argentina have won both previous world finals meetings between the two countries: 1-0 at Uruguay 1930 and 2-1 at Argentina 1978.</p>

                            <h5>Brazil-Germany</h5>
                            <p>Brazil may have the chance to avenge that 7-1 semi-final defeat at the last World Cup as early as the Round of 16. If they suffer a minor slip-up in Group E and only finish second and Germany win Group F, or vice versa, then the two nations will meet in Samara (2 July) or St Petersburg (3 July). After two previous meetings on the big stage, it is honours even: Brazil won the Final of Korea/Japan 2002 2-0, while Germany recorded that famous victory at Brazil 2014.</p>

                            <h5>Russia-Spain</h5>
                            <p>Should they advance from the group phase, the hosts are more than likely to face stiff opposition in the last 16, with Portugal or Spain potentially lying in wait for them, either in Sochi (30 June) or Moscow (1 July). Should Russia come up against the Spanish, it would be the first World Cup finals encounter between the two. La Roja have long been a bogey team for the eastern European nation, winning their first European title against the former USSR in 1964 and then beating them twice en route to their second continental crown, in 2008. </p>

                            <h5>Germany-England</h5>
                            <p>Kazan (6 July) or Samara (7 July) could provide the setting for the latest instalment in one of world football’s great rivalries. Again, one would have to top their group, the other finish second, and both win their last-16 ties. Germany have the upper hand in the head-to-head with three wins in five previous encounters, though England prevailed in the most important one of them all – the Final of England 1966 (4-2 a.e.t.). Since then, it has been virtually all Germany: a 3-2 extra-time win in the quarters at Mexico 1970 , a 4-3 penalty shoot-out victory following a 1-1 draw in the semi-finals at Italy 1990, and a 4-1 win in the last 16 at South Africa 2010. The other meeting, which came in the second round at Spain 1982, ended goalless. </p>

                            <h5>Portugal-Argentina</h5>
                            <p>Lionel Messi and Cristiano Ronaldo will come face to face for the first time in the World Cup only if their two nations finish in the same position in the group phase, either first or second. That would leave them in the same side of the draw and on course for a possible collision in Nizhny Novgorod (6 July) or Sochi (7 July). The countries have never locked horns before in the world finals, adding even more interest to the possible duel between their star players.</p>
                        </div>
                    </div>
                    <!-- End Content Text-->

                    <!-- Comments -->
                    <div class="panel-box">
                        <!-- Title Post -->
                        <div class="titles" id="">
                            <h4 >Comments</h4>
                        </div>
                            @foreach($comments as $comment)

                        <!-- Title Post -->

                        <ul class="testimonials">
                            <li>
                                <blockquote><p class="edit">  {{$comment->text}}!.<i class="fa fa-edit" style="float:right"  data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" ></i></p>

                                    <img src="{{asset('assets/frontend/images/testimonials/1.jpg')}}" alt="">
                                    <strong>Federic Gordon</strong><a href="#">@iwthemes</a></blockquote>
                            </li>
                        </ul>

                    @endforeach
                    </div>
                    <!-- End Comments -->

                    <!-- Comment Form -->
                    <div class="panel-box padding-b">
                        <!-- Title Post -->
                        <div class="titles">
                            <h4>Publish Commnet</h4>
                            <div> <ul class="testimonials">
                                    <li>
                                        <blockquote><p id="commented"></p>
                                            <img src="{{asset('assets/frontend/images/testimonials/1.jpg')}}" alt="">
                                            <strong>Federic Gordon</strong><a href="#">@iwthemes</a></blockquote>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="info-panel">
                            <!-- Form coment -->

                            <form class="form-theme" id="comments">
                            @if(Auth()->user() != null)


                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Comment</label>
                                        <textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment" style="height: 138px;" required="required"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token">
                                        <input type="hidden" value="{{Auth::user()->id }}" id="user_id">
                                        <input type="hidden" value="1" id="news_id">
                                        <input type="submit" value="Post Comment"  class="btn btn-primary">
                                    </div>
                                </div>
                                </div>

                            </form>
                            <!-- End Form coment -->
                        </div>


  @foreach($comments as  $update)

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit_comment">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                <input type="text" class="form-control" id="name" value="{{Auth::user()->first_name}}">
                                                <input type="hidden" class="form-control" id="user_id" value="{{Auth::user()->id }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label"></label>
                                                <textarea class="form-control" id="message-text">{{$update->text}} : {{$update->id}}</textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

@endforeach
                        @endif
                    </div>
                    <!-- End Comment Form -->

                </div>
            </div>
        </div>

    </section>
@stop