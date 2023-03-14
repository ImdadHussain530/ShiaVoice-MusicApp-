
<div class="menu_side">
    <div class="menuNav">
        <h1>Playlist</h1>
        <a onclick="toggleplayList()" class="close"><i class="fa-regular fa-rectangle-xmark"></i></a>

    </div>

    <div class="playlist">
        <h4 class="active" id='PlayList'><span></span><i class="bi bi-music-note-beamed"></i> Playlist</h4>
        <h4 id='FavoriteList'><span></span><i class="bi bi-music-note-beamed" ></i>Favorite List</h4>
        <h4 id='LastListening'><span></span><i class="bi bi-music-note-beamed"></i> Recommended</h4>
    </div>
    <div class="menu_song">
        @php
            $i = 1;

            if(isset($_COOKIE['favMusic'])){
                $var=$_COOKIE['favMusic'];
                $musicObj= json_decode("$var");
                $musiArry=$musicObj->music;
                $musics=$musiArry;

                setcookie("favMusic", "", time()-3600);
                @endphp
                <script>
                    document.getElementById('PlayList').classList.remove("active");
                    document.getElementById('FavoriteList').classList.add("active");
                    document.getElementById('LastListening').classList.remove("active");
                </script>
                @php

            }




        @endphp
        @foreach ($musics as $music)
            <li class="songItem">

                <span>{{ $i < 10 ? '0' . $i : $i }}</span>


                <img src="{{ asset('assets/img/uploaded/' . $music->poster) }}"alt="Alan">

                <h5>
                    {{ $music->title }}
                    <div class="subtitle">{{ $music->artist_name }}</div>
                </h5>
                <div class="flex-row">
                    <div class="favitem mx-3">
                        <a data-musicid="{{ $music->id }}" class="updateMenu_favitem" id="">
                            @php
                                echo App\Http\Controllers\FavListController::checkFavUsingId("$music->id");
                            @endphp
                        </a>

                    </div>
                    <i class="bi playListPlay bi-play-circle-fill" id="{{ $music->id }}"></i>
                </div>

                {{-- make to pass value to javaScript --}}
                <input type="hidden" id="musicdata" value="{{ asset('assets/audio/uploaded/' . $music->music) }}">
                <input type="hidden" id="imgdata" value="{{ asset('assets/img/uploaded/' . $music->poster) }}">
                <input type="hidden" id="titledata" value="{{ $music->title }}">
                <input type="hidden" id="artistdata" value="{{ $music->artist_name }}">
            </li>
            @php

                $i = $i + 1;
            @endphp
        @endforeach
    </div>
</div>
@push('menuSideJavascript')
    <script>
        var user_id = "{{ Auth::id() }}";

        $(document).ready(function() {

            $('#PlayList').click(function(){
                location.reload();
            });

            $('#FavoriteList').click(function(){
                console.log('click');

                // $(this).classList.remove('bi-play-fill');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/FavList',
                    // dataType: "json",
                    success: function(response) {


                        var jsonArray=JSON.stringify(response);

                        console.log(response);
                        document.cookie="favMusic="+jsonArray;

                        location.reload();



                    }

                });

            });

            $('.updateMenu_favitem').click(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var music_id = $(this).attr('data-musicid');
                console.log(user_id);
                console.log(music_id);

                $.ajax({
                    type: 'POST',
                    url: '/updateFavList',
                    data: {
                        music_id: music_id,
                        user_id: user_id

                    },
                    success: function(response) {

                        if (response.action == "add") {
                            console.log('add');

                            $('a[data-musicid=' + music_id + ']').html(
                                `<i class="fas heart-red fa-heart "></i>`)


                        } else if (response.action == "remove") {
                            console.log('remove');

                            $('a[data-musicid=' + music_id + ']').html(
                                `<i class="far heart-white fa-heart "></i>`)

                        }



                    }

                });

            });


        });
    </script>
@endpush
