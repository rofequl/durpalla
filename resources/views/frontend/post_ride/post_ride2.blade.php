@extends('frontend.layout.app')
@section('content')



    <section class="mb-5 overlay">
        <div class="container postRide-container">

            <h1>Offer a ride</h1>
            <br>
            <form method="post" action="{{route('post.ride2')}}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$post->id}}">
                <div class="row">
                    <div class="col-lg-6">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header bg-paste text-white py-1">
                                Price per Co-traveller
                            </div>
                            <div class="card-body bg-light">

                                @foreach($stopover as $stopovers)
                                    <div class="row">
                                        <div class="col-8">{{$stopovers->s_location}} <span
                                                    class="lnr lnr-arrow-right"></span> {{$stopovers->e_location}}</div>
                                        <div class="col-4">

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input type="text" value=" <?php echo ride_price($stopovers->s_lat, $stopovers->s_lng, $stopovers->e_lat, $stopovers->e_lng); ?>" class="form-control" placeholder="00000"
                                                       name="price[]" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="card mt-3 p-0 bg-light">
                            <div class="card-body row pb-1">
                                <div class="col-8">Number of seat</div>
                                <div class="col-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-car"
                                                                                        aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="00" name="seat">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="card p-3">
                            My ride summary
                            <div id="map" style="width: 100%; height: 500px;">
                            </div>
                            <br>
                            <h5>{{$post->s_location}} → {{$post->e_location}}</h5>

                            Departure:
                            {{date("l, F-d", strtotime($post->departure))}}  {{$post->d_time}}:00{{$post->d_time2}}<br>
                            @if($post->return != "")
                                Return ride:
                                {{date("l, F-d", strtotime($post->return))}}  {{$post->r_time}}:00{{$post->r_time2}}<br>
                            @endif
                            Distance:
                            <?php
                            $dist = GetDrivingDistance($post->s_lat, $post->s_lng, $post->e_lat, $post->e_lng);
                            echo $dist['distance'];
                            ?><br>
                            Driving time:
                            {{$dist['time']}}<br>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="mx-auto">
                        <button type="submit" class="genric-btn info circle arrow">Next<span
                                    class="lnr lnr-arrow-right"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </section>



    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 23.777, lng: 90.399
                },
                zoom: 6.5
            });
        }
    </script>



@endsection