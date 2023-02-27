<x-layout.admin.App>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <h1 class="p-3 font-weight-bold">Edit Artist</h1>
        <div class="container">


        <form action="{{route('UpdateArtist')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Artist Name</label>
                <div class="col-sm-6">
                    <input type="text" name="artist_name"  class="form-control" id="artist_name" value="{{$artists->artist_name}}">
                    @error('artist_name')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
               @enderror
                </div>

            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">CurrentPhoto</label>
                <div class="col-sm-6">
                    <img src="{{asset('assets/img/Artists/'.$artists->artist_photo)}}" alt=""  style="width: 150px">
                    <input type="hidden" name="oldPhoto" id="oldPhoto" value="{{$artists->artist_photo}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">New Photo</label>
                <div class="col-sm-6">
                    <input type="file" name="newPhoto"  class="form-control" id="newPhoto" accept="image/jpeg" >
                    @error('artist_photo')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 ">Feature</label>
                <div class="col-sm-6">
                    <input type="radio" {{$artists->feature?"checked":""}}  name="feature" id="feature" value="1">
                    <label  class="form-check-label m-2">On</label>
                    <input type="radio" {{$artists->feature?"":"checked"}} name="feature" id="feature" value="0">
                    <label  class="form-check-label m-2"  >Off</label>
                    @error('feature')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
               @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 ">Active</label>
                <div class="col-sm-6">
                    <input type="radio" {{$artists->active?"checked":""}} name="active" id="active" value="1">
                    <label  class="form-check-label m-2" >On</label>
                    <input type="radio" {{$artists->active?"":"checked"}} name="active" id="active" value="0">
                    <label  class="form-check-label m-2" >Off</label>
                    @error('active')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
               @enderror
                </div>
            </div>
            <input type="hidden" name="id" id="id" value="{{$artists->id}}">

            <button class="btn btn-primary" type="submit">Update</button>

        </form>
    </div>

    </div>

</x-layout.admin.App>
