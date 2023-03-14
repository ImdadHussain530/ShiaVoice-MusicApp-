
<div class="song_side">
    <nav class="nav1">
        <div class="playlist-icon">
            <a onclick="toggleplayList()"><i class="fa-solid fa-bars"></i></a>
        </div>
        <script>
            let header=document.querySelector('.header');
            function toggleplayList(){
                header.classList.toggle('active')
            }
        </script>
        <div class="brand">
            <a class="text-warning" href=""><h5 style="margin: 0px;">ShiaVoice</h5></a>
        </div>

        <div class="user">

            @if (isset($user->email))
            <a class="text-light d-flex" href="{{route('logout')}}"><span><i class="fa-solid fa-user mr-2"></i></span>LogOut</a>

            @else
            <a class="" href="{{route('LoginView')}}"><i class="fa-solid fa-user"></i>Login</a>
            <h6>Guest</h6>
            <img src="{{ asset('assets/img/KDS CODER.png') }}"alt="User" title="KDS CODER (Jahid Khan)">
            @endif




        </div>

    </nav>
    <nav>
        <ul>
            <li>Discover <span></span></li>
            {{-- <li>MY LIBRARY</li>
            <li>RADIO</li> --}}
        </ul>
        <div class="search">
            <i class="bi bi-search"></i>
            <form method="get" action="{{ route('search') }}">

                <input id="search" name="search" type="text" placeholder="Search Music...">
            </form>

        </div>


    </nav>
    {{-- $content get from component during initialization --}}
            @if ($content=="display")
                <div class="content">
                    <h1>Alen Walker-Fade</h1>
                    <p>
                        You were the shadow to my light Did you feel us Another start You fade
                        <br>
                        Away afraid our aim is out of sight Wanna see us Alive
                    </p>
                    <div class="buttons">
                        <button>PLAY</button>
                        <button>FOLLOW</button>
                    </div>
                </div>
            @endif






    <div class="popular_song">
        <div class="h4">
            <h4>{{$title}}</h4>
            <div class="btn_s">
                <i id="left_scroll" class="bi bi-arrow-left-short"></i>
                <i id="right_scroll" class="bi bi-arrow-right-short"></i>
            </div>
        </div>
        <div class="pop_song">
            @foreach ($popularmusics as $music)
                <li class="songItem">
                    <div class="img_play">
                        <img src="{{ asset('assets/img/uploaded/' . $music->poster) }}"alt="alan">
                        <i class="bi playListPlay bi-play-circle-fill" id="{{ $music->id }}"></i>
                    </div>
                    <input type="hidden" id="musicdata"
                            value="{{ asset('assets/audio/uploaded/' . $music->music) }}">
                        <input type="hidden" id="imgdata" value="{{ asset('assets/img/uploaded/' . $music->poster) }}">
                        <input type="hidden" id="titledata" value="{{ $music->title }}">
                        <input type="hidden" id="artistdata" value="{{ $music->artist->get(0)->artist_name }}">
                    <h5>{{ $music->title }}
                        <br>
                        <div class="subtitle">{{ $music->artist->get(0)->artist_name }}</div>
                    </h5>

                </li>
            @endforeach


        </div>
    </div>
    <div class="popular_artists">
        <div class="h4">
            <h4>Popular Artists</h4>
            <div class="btn_s">
                <i id="left_scrolls" class="bi bi-arrow-left-short"></i>
                <i id="right_scrolls" class="bi bi-arrow-right-short"></i>
            </div>
        </div>
        <div class="item">
            @foreach ($popularArtists as $popularArtist)
                <li>
                    <img src="{{ asset('assets/img/artists/' . $popularArtist->artist_photo) }}" alt="Arjit Singh"
                        title="Arjit Singh">
                </li>
            @endforeach


        </div>
    </div>
</div>
