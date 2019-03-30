@extends('frontend.sp_panel.profile.layout.app')

@section('content')

    <div class="content">

        <h3>Your profile photo</h3>
        <hr>
        <p>Add your photo now! Other members will be reassured to see who they'll be travelling with, and you'll find
            your car share much more easily. Photos also help members to recognise each other</p>
        <div class="card">
            <div class="card-body">
                <div class="row">
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
                    <div class="col-8 text-center">
                        <img src="" class="img-fluid rounded img-thumbnail mx-auto"
                             style="height: 150px;width: 150px;display: none"
                             id="previewLogo">
                        <h3 class="text-muted mt-5">Upload your profile photo</h3>
                        <button class="btn btn-primary my-2" id="imgButton" onclick="logoUpload()">Choose a file</button>
                        <form method="post" action="{{route('sp.account.photo.store')}}"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" class="d-none" name="image" id="image">
                            <button class="btn btn-sm px-5 btn-primary my-2" style="display: none" id="imgButton2">Save</button>
                        </form>
                        <p>PNG, JPG or GIF, max. 3MB</p>

                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                                    </div>
                                    <div class="col-6">
                                        <p class="text-muted">Example of a good photo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-success">How to choose the right photo</p>
                        <p class="my-0">No sunglasses</p>
                        <p class="my-0">Facing the camera</p>
                        <p class="my-0">You alone</p>
                        <p class="my-0">Clear and bright</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // image upload file open
        function logoUpload() {
            jQuery("#image").click();
        }

        // Function to preview image after validation
        $(function () {
            jQuery("#image").change(function () {
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    alert("only jpeg, jpg and png Images type allowed");
                    return false;
                }
                else {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            jQuery('#previewLogo').attr('src', e.target.result).css("display","block");
            jQuery("#imgButton").hide();
            jQuery("#imgButton2").show();
        }
    </script>


@endsection