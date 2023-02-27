<x-layout.app>
    {{-- @if (session()->has('fail'))

        <span class="alert alert-danger">{{session()->get('fail')}}</span>

    @endif --}}

    <x-partials.menuSide :musics="$musics" />


    <x-partials.song-side :user="$user" title="PopularMusics" :popularmusics="$popularmusics" :popularArtists="$popularArtists" content="display"  />

    <x-partials.master-play />


</x-layout.app>



