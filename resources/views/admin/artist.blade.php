<x-layout.admin.App>
    <x-partials.admin.navbar />
    <x-partials.admin.sidebar />
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <h1 class="p-3 font-weight-bold">Artist</h1>
        <div class="container">
            <a name="" id="" class="btn btn-primary " href="{{route('addartist')}}" role="button">Add Artist</a>
            <table class=" table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Sr</th>
                        <th scope="col">Artist Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Feature</th>
                        <th scope="col">Active</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($artists as $artist)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{ $artist->artist_name }}</td>
                            <td><img class="img-fluid" src="{{asset('assets/img/Artists/'.$artist->artist_photo)}}" style="width: 100px" alt="NO Photo Available"></td>
                            <td>{{ $artist->feature?"On":"OFF"}}</td>
                            <td>{{ $artist->active?"On":"OFF" }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <a name="" id="" class="btn btn-primary" href="{{route('updateViewArtist',['id'=>$artist->id])}}"
                                        role="button">Update</a>
                                    <a name="" id="" class="btn btn-primary" href="{{route('DeleteArtist',['id'=>$artist->id])}}"
                                        role="button">Delete</a>

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
</x-layout.admin.App>
