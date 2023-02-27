<div class="song_side">
    <nav>
        <ul>
            <li>Discover <span></span></li>
            <li>MY LIBRARY</li>
            <li>RADIO</li>
        </ul>
        <div class="search">
            <form method="get" action="{{ route('search') }}">
                <i class="bi bi-search"></i>
                <input id="search" name="search" type="text" placeholder="Search Music...">
            </form>

        </div>
        <div class="user">

            @if (isset($user->email))
            <a class="text-sm text-light" href="{{route('logout')}}">Logout</a>
            <a class="" aria-label="Account:{{$user->email}}"  aria-expanded="false">
                <img class="" src="https://lh3.googleusercontent.com/ogw/AAEL6sg9UgU3J_LV2qQZ8QE4HKNFqfTN8NOEopMpSOoU=s32-c-mo" srcset="https://lh3.googleusercontent.com/ogw/AAEL6sg9UgU3J_LV2qQZ8QE4HKNFqfTN8NOEopMpSOoU=s32-c-mo 1x, https://lh3.googleusercontent.com/ogw/AAEL6sg9UgU3J_LV2qQZ8QE4HKNFqfTN8NOEopMpSOoU=s64-c-mo 2x " alt="" aria-hidden="true" data-noaft="" data-iml="1677480437414" data-atf="1" data-frt="0">
            </a>
            @else
            <a class="" href="{{route('LoginView')}}">Login</a>
            <h6>Guest</h6>
            <img src="{{ asset('assets/img/KDS CODER.png') }}"alt="User" title="KDS CODER (Jahid Khan)">
            @endif




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
                        <i class="bi playListPlay bi-play-circle-fill"></i>
                        <input type="hidden" id="musicdata"
                            value="{{ asset('assets/audio/uploaded/' . $music->music) }}">
                        <input type="hidden" id="imgdata" value="{{ asset('assets/img/uploaded/' . $music->poster) }}">
                        <input type="hidden" id="titledata" value="{{ $music->title }}">
                        <input type="hidden" id="artistdata" value="{{ $music->artist->get(0)->artist_name }}">
                        {{-- <input type="hidden" id="musicdata" value="{{asset('assets/audio/uploaded/'.$musics->music)}}"> --}}
                        {{-- <input type="hidden" id="imgdata" value="{{asset('assets/img/uploaded/'.$musics->poster)}}"> --}}
                    </div>
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
