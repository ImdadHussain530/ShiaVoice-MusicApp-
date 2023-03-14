
<x-layout.admin.App>
    <x-partials.admin.navbar />
    <x-partials.admin.sidebar />
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <h1 class="p-3 font-weight-bold">Music</h1>
        <div class="container">
            <a name="" id="" class="btn btn-primary " href="{{route('addmusic')}}" role="button">Add Music</a>
            <div class="table-responsive">
            <table class=" table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Sr</th>
                        <th scope="col">Title</th>
                        <th scope="col">Music</th>
                        <th scope="col">Poster</th>
                        <th scope="col">Type</th>
                        <th scope="col">Artist</th>
                        <th scope="col">Feature</th>
                        <th scope="col">Active</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($musics as $music)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{ $music->title }}</td>
                            <td>

                                {{-- {{$music->music}} --}}
                                <audio  controls id="myAudio" preload="metadata">
                                    <source src="{{ asset('assets/audio/uploaded/' . $music->music) }}" type="audio/mpeg" >
                                </audio>




                            </td>
                            <td>
                                <img src="{{asset('assets/img/uploaded/'.$music->poster)}}" style="width:100px" alt="">
                            </td>
                            <td>{{ $music->music_type }}</td>
                            <td>{{ $music->artist->get(0)->artist_name }}</td>
                            <td>{{ $music->feature?"On":"OFF"}}</td>
                            <td>{{ $music->active?"On":"OFF" }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <a name="" id="" class="btn btn-primary" href="{{route('updateViewMusic',['id'=>$music->id])}}"
                                        role="button"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a name="" id="" class="btn btn-primary" href="{{route('DeleteMusic',['id'=>$music->id])}}"
                                        role="button"><i class="fa-solid fa-trash"></i></a>

                                </div>

                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                </tbody>
            </table>
        </div>


        </div>
    </div>
</x-layout.admin.App>
