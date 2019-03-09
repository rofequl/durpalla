@extends('backend.layout.app')

@section('content')

    <div class="content">

        @if(isset($data2))
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Update Promo Code
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('promo_code.store')}}">
                        {{csrf_field()}}
                        <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"></label>
                                    <input type="number" class="form-control" name="p_amount" id=""
                                           placeholder="Percent Amount">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4"></label>
                                    <input type="number" class="form-control" name="h_amount" id=""
                                           placeholder="Highest Amount">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4"></label>
                                    <input type="text" class="form-control" name="c_area" id=""
                                           placeholder="Center Area">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"></label>
                                    <input type="number" class="form-control" id="" name="r_area"
                                           placeholder="Radius form center area">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"></label>
                                    <input type="text" class="form-control" id="" name="code" placeholder="Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"></label>
                                    <input type="text" class="form-control datepicker" name="s_date" id=""
                                           placeholder="Start Date">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4"></label>
                                    <input type="text" class="form-control datepicker" name="e_date" id=""
                                           placeholder="End Date">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Promo Code</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Promo Code
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Add
                    Promo Code
                </button>
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Percent Amount</th>
                        <th>Highest Amount</th>
                        <th>Code</th>
                        <th>Center Area</th>
                        <th>Radius form Center Area</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($promo as $promos)
                        <tr>

                            <td>{{$promos->p_amount}}</td>
                            <td>{{$promos->h_amount}}</td>
                            <td>{{$promos->code}}</td>
                            <td>{{$promos->c_area}}</td>
                            <td>{{$promos->r_area}}</td>
                            <td>{{$promos->s_date}}</td>
                            <td>{{$promos->e_date}}</td>
                            <td>
                                @if($promos->publish == 0)
                                    <a href="{{url('sp-delete-car?Delete='.$promos->id)}}"
                                       class="btn btn-sm btn-secondary delete">Publish</a>
                                @else
                                    <a href="{{route('promo_code.index',$promos->id)}}"
                                       class="btn btn-sm btn-primary delete">Not Publish</a>
                                @endif
                                <a href="{{route('promo_code.index',$promos->id)}}"
                                   class="btn btn-sm btn-success">Edit</a>
                                <a href="{{route('promo_code.destroy',$promos->id)}}"
                                   class="btn btn-sm btn-danger delete">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Promo Code Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('promo_code.store')}}">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"></label>
                                <input type="number" class="form-control" name="p_amount" id=""
                                       placeholder="Percent Amount">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4"></label>
                                <input type="number" class="form-control" name="h_amount" id=""
                                       placeholder="Highest Amount">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputPassword4"></label>
                                <input type="text" class="form-control" name="c_area" id="" placeholder="Center Area">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"></label>
                                <input type="number" class="form-control" id="" name="r_area"
                                       placeholder="Radius form center area">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"></label>
                                <input type="text" class="form-control" id="" name="code" placeholder="Code">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"></label>
                                <input type="text" class="form-control datepicker" name="s_date" id=""
                                       placeholder="Start Date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4"></label>
                                <input type="text" class="form-control datepicker" name="e_date" id=""
                                       placeholder="End Date">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Promo Code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection