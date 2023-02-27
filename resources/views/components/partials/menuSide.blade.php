<div class="menu_side">
    <h1>Playlist</h1>
    <div class="playlist">
        <h4 class="active"><span></span><i class="bi bi-music-note-beamed"></i> Playlist</h4>
        <h4><span></span><i class="bi bi-music-note-beamed"></i> Last Listening</h4>
        <h4><span></span><i class="bi bi-music-note-beamed"></i> Recommended</h4>
    </div>
    <div class="menu_song">
        @php
            $i = 1;

        @endphp
        @foreach ($musics as $music)
            <li class="songItem">

                <span>{{ $i < 10 ? '0' . $i : $i }}</span>

                <img src="{{ asset('assets/img/uploaded/' . $music->poster) }}"alt="Alan">

                <h5>
                    {{ $music->title }}
                    <div class="subtitle">{{ $music->artist->get(0)->artist_name }}</div>
                </h5>
                <i class="bi playListPlay bi-play-circle-fill" id="{{ $i }}"></i>
                {{-- make to pass value to javaScript --}}
                <input type="hidden" id="musicdata" value="{{ asset('assets/audio/uploaded/' . $music->music) }}">
                <input type="hidden" id="imgdata" value="{{ asset('assets/img/uploaded/' . $music->poster) }}">
                <input type="hidden" id="titledata" value="{{ $music->title }}">
                <input type="hidden" id="artistdata" value="{{ $music->artist->get(0)->artist_name }}">
            </li>
            @php

                $i = $i + 1;
            @endphp
        @endforeach
    </div>
</div>
