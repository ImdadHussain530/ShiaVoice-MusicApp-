<x-layout.app>


    <x-partials.menuSide :musics="$musics"/>

    <x-partials.song-side  :user="$user" title="Search" :popularmusics="$popularmusics" :popularArtists="$popularArtists" content=""/>

    <x-partials.master-play />


</x-layout.app>
