<x-layout.admin.App>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <h1 class="p-3 font-weight-bold">Artist</h1>
        <div class="container">


        <form action="{{route('storeartist')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Artist Name</label>
                <div class="col-sm-6">
                    <input type="text" name="artist_name"  class="form-control" id="artist_name" placeholder="eg: Nadeem sarwar">
                    @error('artist_name')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
               @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-6">
                    <input type="file" name="artist_photo"  class="form-control" id="artist_photo" accept="image/jpeg" >
                    @error('artist_photo')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
               @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 ">Feature</label>
                <div class="col-sm-6">
                    <input type="radio"  name="feature" id="feature" value="1">
                    <label  class="form-check-label m-2">On</label>
                    <input type="radio" name="feature" id="feature" value="0">
                    <label  class="form-check-label m-2"  >Off</label>
                    @error('feature')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
               @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 ">Active</label>
                <div class="col-sm-6">
                    <input type="radio"  name="active" id="active" value="1">
                    <label  class="form-check-label m-2" >On</label>
                    <input type="radio" name="active" id="active" value="0">
                    <label  class="form-check-label m-2" >Off</label>
                    @error('active')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
               @enderror
                </div>
            </div>

            <button class="btn btn-primary" type="submit">submit</button>

        </form>
    </div>

    </div>

</x-layout.admin.App>
