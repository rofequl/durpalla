@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">
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
            <div class="card-header">
                Remove Resource list
            </div>
            <div class="card-body">
                <table class="table table-striped" cellspacing="0" id="DataTable">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>National Id</th>
                        <th>National Id Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $listNum = 1; ?>
                    @foreach($resource as $resources)
                        <tr>
                            <td>{{$listNum}}</td>
                            <td>{{$resources->name}}</td>
                            <td>{{$resources->phone}}</td>
                            <td>
                                <img src="{{asset('storage/resource/'.$resources->image)}}"
                                     class="img-thumbnail" width="70px" alt="...">
                            </td>
                            <td>{{$resources->national_id}}</td>
                            <td>
                                <img src="{{asset('storage/resource/'.$resources->nid_image1)}}"
                                     class="img-thumbnail" width="70px" alt="...">
                                <img src="{{asset('storage/resource/'.$resources->nid_image2)}}"
                                     class="img-thumbnail" width="70px" alt="...">
                            </td>
                            <td>
                                <a href="{{route('resource.restore',$resources->id)}}"
                                   class="btn btn-sm btn-primary delete">Restore</a>
                            </td>
                        </tr>
                        <?php $listNum++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection