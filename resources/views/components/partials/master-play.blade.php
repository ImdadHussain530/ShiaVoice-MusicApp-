<style>
    .update_favitem {
        margin-left: 15px;
    }

    .heart-red {
        color: red;
        border: 1px white;
    }

    .heart-white {
        color: white;

    }
</style>

<div class="master_play">
    <div class="section1">
        <div class="wave">
            <div class="wave1"></div>
            <div class="wave1"></div>
            <div class="wave1"></div>
        </div>
        <img src="{{ asset('assets/img/26th.jpg') }}"alt="Alan" id="poster_master_play">
        <h5 id="title">Vande Mataram<br>
            <div class="subtitle" id="subtitle">Bankim Chandra</div>
        </h5>
        <input type="hidden" id="Master_musicId" value="">



        <div class="icon">
            <a class="update_favitem" data-musicid="" id="update_favitem">
                @php
                    echo App\Http\Controllers\FavListController::checkFav();
                @endphp



            </a>
            <i class="bi bi-skip-start-fill" id="back"></i>
            <i class="bi bi-play-fill" id="masterPlay"></i>
            <i class="bi bi-skip-end-fill" id="next"></i>
        </div>
    </div>
    <div class="section2">
        <span id="currentStart">0:00</span>
        <div class="bar">
            <input type="range" id="seek" min="0" max="100" value="0">
            <div class="bar2" id="bar2"></div>
            <div class="dot"></div>
        </div>
        <span id="currentEnd">0:00</span>

        <div class="vol">
            <i class="bi bi-volume-down-fill" id="vol_icon"></i>
            <input type="range" id="vol" min="0" value="" max="100">
            <div class="vol_bar"></div>
            <div class="dot" id="vol_dot"></div>
        </div>
    </div>




</div>




@push('javascript')
    <script>
        var user_id = "{{ Auth::id() }}";

        $(document).ready(function() {
            $('.update_favitem').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var music_id = $('.update_favitem').attr('data-musicid');

                $.ajax({
                    type: 'POST',
                    url: '/updateFavList',
                    data: {
                        music_id: music_id,
                        user_id: user_id

                    },
                    success: function(response) {

                        if (response.action == "add") {

                            $('a[data-musicid=' + music_id + ']').html(
                                `<i class="fas heart-red fa-heart "></i>`)


                        } else if (response.action == "remove") {

                            $('a[data-musicid=' + music_id + ']').html(
                                `<i class="far heart-white fa-heart "></i>`)

                        }



                    }

                });

            });


        });
    </script>
@endpush
