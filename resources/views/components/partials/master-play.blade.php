<div class="master_play">
    <div class="wave">
        <div class="wave1"></div>
        <div class="wave1"></div>
        <div class="wave1"></div>
    </div>
    <img src="{{asset('assets/img/26th.jpg')}}"alt="Alan" id="poster_master_play">
    <h5 id="title">Vande Mataram<br>
        <div class="subtitle" id="subtitle">Bankim Chandra</div>
    </h5>
    <div class="icon">
        <i class="bi bi-skip-start-fill" id="back"></i>
        <i class="bi bi-play-fill" id="masterPlay"></i>
        <i class="bi bi-skip-end-fill" id="next"></i>
    </div>
    <span id="currentStart">0:00</span>
    <div class="bar">
        <input type="range" id="seek" min="0" value="0" max="100">
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
