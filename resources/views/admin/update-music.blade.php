<x-layout.admin.App>
    <x-partials.admin.navbar />
    <x-partials.admin.sidebar />
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <h1 class="p-3 font-weight-bold">Add Music</h1>
        <div class="container">
            <form action="{{route('UpdateMusic')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-6">
                        <input type="text" name="title" class="form-control row" id="title"
                            placeholder="Music Title" value="{{$musics->title}}">
                        @error('title')
                            <div class="row col-6" style="font-size:1rem;color:red;">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Artist Name</label>
                    <select name="artist_id" id="artist_id">
                        <option value="">choose</option>
                        @foreach ($artists as $artist)
                            <option {{($musics->artist_id==$artist->id)?"Selected":""}} value="{{$artist->id}}">{{ $artist->artist_name }}</option>
                        @endforeach
                    </select>
                    @error('artist_id')
                        <div class="row col-6" style="font-size:1rem;color:red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Current Music</label>
                    <div class="col-sm-6">
                        <audio  controls>
                            <source  src="{{ asset('assets/audio/uploaded/' . $musics->music) }}" type="audio/mp3">
                            <input type="hidden" name="oldMusic" id="oldMusic" value="{{$musics->music}}">
                        </audio>

                    </div>
                </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Music</label>
            <div class="col-sm-6">
                <input type="file" name="newMusic" class="form-control" id="newMusic" accept="audio/mp3">
                @error('music')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="music_type " class=" col-sm-2">Music Type</label>
            <select id="music_type" class="form-control col-sm-3" name="music_type">
                <option {{($musics->music_type=="navha")?"Selected":""}} value="navha">Navha</option>
                <option {{($musics->music_type=="manqabat")?"Selected":""}} value="manqabat">Manqabat</option>
                <option {{($musics->music_type=="qasida")?"Selected":""}} value="qasida">Qasida</option>
                <option {{($musics->music_type=="dua")?"Selected":""}} value="dua">Dua</option>
            </select>
            @error('music_type')
                <div class="row col-6" style="font-size:1rem;color:red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Current Poster</label>
            <div class="col-sm-6">
                <img  src="{{asset('assets/img/uploaded/'.$musics->poster)}}" style="width:100px;" alt="">
                <input type="hidden" name="oldPoster" id="oldPoster" value="{{$musics->poster}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Poster</label>
            <div class="col-sm-6">
                <input type="file" name="newPoster" class="form-control" id="newPoster" accept="image/jpeg">
                @error('poster')
                    <div class="row col-6" style="font-size:1rem;color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 ">Feature</label>
            <div class="col-sm-6">
                <input type="radio" checked="checked" name="feature" id="feature" value="1">
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
                <input type="radio" checked="checked" name="active" id="active" value="1">
                <label  class="form-check-label m-2" >On</label>
                <input type="radio" name="active" id="active" value="0">
                <label  class="form-check-label m-2" >Off</label>
                @error('active')
                <div class="row col-6" style="font-size:1rem;color:red;">{{$message}}</div>
           @enderror
            </div>
        </div>
        <input type="hidden" name="id" id="id" value="{{$musics->id}}">

        <button class="btn btn-primary" type="submit">Update</button>

        </form>
    </div>



    </div>


</x-layout.admin.App>
