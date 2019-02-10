@extends('backend.layout.app')

@section('content')
    <div class="content">

        <div class="card shadow">
            <div class="card-header">
                Complain
            </div>
            <div class="card-body p-0">
                <div class="media p-2">
                    <img src="{{asset('img/about-author.png')}}" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Anwar Hossain</h5>
                        <p>22/01/2019</p>
                    </div>
                    <button class="btn btn-sm btn-warning">Action</button>
                </div>
                <div class="m-2">
                    <h5>Order Id: 505</h5>
                    <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum delectus deserunt
                            dolorum id, nisi odit repellat? Aliquid culpa doloribus eligendi eos, excepturi in
                            iure molestias nihil. Consectetur ex magnam nam.</span>
                    </p>
                </div>
                <hr class="bg-dark">

                <div class="media p-2">
                    <img src="{{asset('img/about-author.png')}}" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Anwar Hossain</h5>
                        <p>22/01/2019</p>
                    </div>
                    <button class="btn btn-sm btn-warning">Action</button>
                </div>
                <div class="m-2">
                    <h5>Order Id: 505</h5>
                    <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum delectus deserunt
                            dolorum id, nisi odit repellat? Aliquid culpa doloribus eligendi eos, excepturi in
                            iure molestias nihil. Consectetur ex magnam nam.</span>
                    </p>
                </div>
                <hr class="bg-dark">
            </div>
        </div>
    </div>


@endsection