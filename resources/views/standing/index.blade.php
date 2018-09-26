@extends('layouts.tournament')
@section('standings')
    <!-- Section Title -->
    <div class="section-title" style="background:url({{asset('assets/frontend/images/slide/1.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Points Table</h1>
                </div>

                <div class="col-md-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Standings</li>
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
                    <div class="form-group">
                        <label for="seasonstanding">Select list (select one):</label>
                        <select class="form-control" id="seasonstanding">
                            <?php $i = 18;?>
                            @foreach($season as $seasons)
                                <option value="{{$seasons->season}}">20{{$i}}</option>
                                <?php $i--; ?>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <table class="table-striped table-hover result-point">
                        <thead class="point-table-head">
                        <tr>
                            <th class="text-left">TEAM</th>
                            <th class="text-center">Played</th>
                            <th class="text-center">Win</th>
                            <th class="text-center">Draw</th>
                            <th class="text-center">Loss</th>
                            <th class="text-center">GF</th>
                            <th class="text-center">GA</th>
                            <th class="text-center">GD</th>
                            <th class="text-center">PTS</th>
                        </tr>
                        </thead>
                        <tbody class="text-center stadata">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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