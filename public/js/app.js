
// create Array

// const songs = [
//     {
//         id:'1',
//         songName:` On My Way <br>
//         <div class="subtitle">Alan Walker</div>`,
//         poster: 'assets/img/uploaded/poster1676427727.jpg'
//     },
//     {
//         id:'2',
//         songName:` Alan Walker-Fade <br>
//         <div class="subtitle">Alan Walker</div>`,
//         poster: "assets/img/2.jpg"
//     },
//     // all object type
//     {
    //         id:"3",
    //         songName: `Cartoon - On & On <br><div class="subtitle"> Daniel Levi</div>`,
    //         poster: "assets/img/3.jpg",
    //     },
    //     {
        //         id:"4",
        //         songName: `Warriyo - Mortals <br><div class="subtitle">Mortals</div>`,
        //         poster: "assets/img/4.jpg",
        //     },
        //     {
            //         id:"5",
            //         songName: `Ertugrul Gazi <br><div class="subtitle">Ertugrul</div>`,
            //         poster: "assets/img/5.jpg",
            //     },
            //     {
                //         id:"6",
                //         songName: `Electronic Music <br><div class="subtitle">Electro</div>`,
                //         poster: "assets/img/6.jpg",
                //     },
                //     {
                    //         id:"7",
//         songName: `Agar Tum Sath Ho <br><div class="subtitle">Tamashaa</div>`,
//         poster: "assets/img/7.jpg",
//     },
//     {
    //         id:"8",
    //         songName: `Suna Hai <br><div class="subtitle">Neha Kakker</div>`,
    //         poster: "assets/img/8.jpg",
    //     },
    //     {
        //         id:"9",
        //         songName: `Dilber <br><div class="subtitle">Satyameva Jayate</div>`,
        //         poster: "assets/img/9.jpg",
        //     },
        //     {
            //         id:"10",
            //         songName: `Duniya <br><div class="subtitle">Luka Chuppi</div>`,
            //         poster: "assets/img/10.jpg",
            //     },
            //     {
//         id:"11",
//         songName: `Lagdi Lahore Di <br><div class="subtitle">Street Dancer 3D</div>`,
//         poster: "assets/img/11.jpg",
//     },
//     {
    //         id:"12",
    //         songName: `Putt Jatt Da <br><div class="subtitle">Putt Jatt Da</div>`,
    //         poster: "assets/img/12.jpg",
    //     },
    //     {
        //         id:"13",
        //         songName: `Baarishein <br><div class="subtitle">Atif Aslam</div>`,
        //         poster: "assets/img/13.jpg",
        //     },
        //     {
            //         id:"14",
            //         songName: `Vaaste <br><div class="subtitle">Dhvani Bhanushali</div>`,
            //         poster: "assets/img/14.jpg",
            //     },
            //     {
                //         id:"15",
                //         songName: `Lut Gaye <br><div class="subtitle">Jubin Nautiyal</div>`,
                //         poster: "assets/img/15.jpg",
                //     },
                // ]

                // Array.from(document.getElementsByClassName('songItem')).forEach((element, i)=>{
//     element.getElementsByTagName('img')[0].src = songs[i].poster;
//     element.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
// })

let music = new Audio();

let masterPlay = document.getElementById('masterPlay');
let wave = document.getElementsByClassName('wave')[0];

masterPlay.addEventListener('click', () => {
    if (music.paused || music.currentTime <= 0) {
        music.play();
        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
        wave.classList.add('active2');
    } else {
        music.pause();
        masterPlay.classList.add('bi-play-fill');
        masterPlay.classList.remove('bi-pause-fill');
        wave.classList.remove('active2');
    }
})


const makeAllPlays = () => {
    Array.from(document.getElementsByClassName('playListPlay')).forEach((element) => {
        element.classList.add('bi-play-circle-fill');
        element.classList.remove('bi-pause-circle-fill');
    })
}
const makeAllBackgrounds = () => {
    Array.from(document.getElementsByClassName('songItem')).forEach((element) => {
        element.style.background = "rgb(105, 105, 170, 0)";
    })
}

let index = 0;
let musicSrc = 0;
let poster_master_play = document.getElementById('poster_master_play');
let title = document.getElementById('title');
let productId = document.querySelector('#update_favitem');
const subtitle = document.createElement("div");
subtitle.setAttribute('class', 'subtitle');

Array.from(document.getElementsByClassName('playListPlay')).forEach((element) => {
    element.addEventListener('click', (e) => {
        index = e.target.id;
        musicElement = e.target.nextElementSibling;//to get next element from class playListPlays
        imgElement = musicElement.nextElementSibling;
        titleElement = imgElement.nextElementSibling;
        subtitleElement = titleElement.nextElementSibling;

        musicSrc = musicElement.value;
        imgSrc = imgElement.value;
        // const myHeaders = new Headers();
        // myHeaders.set("Content-Type", "audio/mpeg");
        // myHeaders.set("Accept-Ranges", "bytes");
        // myHeaders.set("Content-Length","")

        title.innerHTML = titleElement.value;//due to this line in title all div deleted so we make it above and append it

        title.appendChild(subtitle);
        subtitle.innerHTML = subtitleElement.value;
        // console.log(index);
        // console.log(productId);

        // console.log(musicSrc);
        makeAllPlays();
        e.target.classList.remove('bi-play-circle-fill');
        e.target.classList.add('bi-pause-circle-fill');
        music.src = `${musicSrc}`;
        poster_master_play.src = `${imgSrc}`;
        console.log('click');
        productId.setAttribute('data-musicid', index);
        productId.innerHTML = "<?php checkFav();?>";
        document.cookie = "selected_music=" + index;
        music.play();

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            productId.innerHTML =
                this.responseText;
        }
        xhttp.open("GET", "function");
        xhttp.send();
        // let song_title = songs.filter((ele)=>{
        //     return ele.id == index;
        // })

        // song_title.forEach(ele =>{
        //     let {songName} = ele;
        //     title.innerHTML = songName;
        // })
        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
        wave.classList.add('active2');
        music.addEventListener('ended', () => {
            masterPlay.classList.add('bi-play-fill');
            masterPlay.classList.remove('bi-pause-fill');
            wave.classList.remove('active2');
        })
        makeAllBackgrounds();
        // Array.from(document.getElementsByClassName('songItem'))[`${index - 1}`].style.background = "rgb(105, 105, 170, .1)";
    })
})


let currentStart = document.getElementById('currentStart');
let currentEnd = document.getElementById('currentEnd');
let seek = document.getElementById('seek');
let bar2 = document.getElementById('bar2');
let dot = document.getElementsByClassName('dot')[0];

music.addEventListener('timeupdate', () => {

    let music_curr = music.currentTime;
    let music_dur = music.duration;
    console.log(music_curr)

    let min = Math.floor(music_dur / 60);
    let sec = Math.floor(music_dur % 60);
    if (sec < 10) {
        sec = `0${sec}`
    }
    currentEnd.innerText = `${min}:${sec}`;

    let min1 = Math.floor(music_curr / 60);
    let sec1 = Math.floor(music_curr % 60);
    if (sec1 < 10) {
        sec1 = `0${sec1}`
    }
    currentStart.innerText = `${min1}:${sec1}`;

    let progressbar = parseInt((music.currentTime / music.duration) * 100);
    seek.value = progressbar;
    let seekbar = seek.value;
    bar2.style.width = `${seekbar}%`;
    dot.style.left = `${seekbar}%`;
})

seek.addEventListener('change', () => {
    console.log('change');
    let seekto =  music.duration * (seek.value / 100);
    // music.load();
    music.currentTime=seekto;
    console.log(seekto);
    console.log(music.currentTime);




})

music.addEventListener('ended', () => {
    masterPlay.classList.add('bi-play-fill');
    masterPlay.classList.remove('bi-pause-fill');
    wave.classList.remove('active2');
})


let vol_icon = document.getElementById('vol_icon');
let vol = document.getElementById('vol');
let vol_dot = document.getElementById('vol_dot');
let vol_bar = document.getElementsByClassName('vol_bar')[0];

vol.addEventListener('change', () => {
    if (vol.value == 0) {
        vol_icon.classList.remove('bi-volume-down-fill');
        vol_icon.classList.add('bi-volume-mute-fill');
        vol_icon.classList.remove('bi-volume-up-fill');
    }
    if (vol.value > 0) {
        vol_icon.classList.add('bi-volume-down-fill');
        vol_icon.classList.remove('bi-volume-mute-fill');
        vol_icon.classList.remove('bi-volume-up-fill');
    }
    if (vol.value > 50) {
        vol_icon.classList.remove('bi-volume-down-fill');
        vol_icon.classList.remove('bi-volume-mute-fill');
        vol_icon.classList.add('bi-volume-up-fill');
    }

    let vol_a = vol.value;
    vol_bar.style.width = `${vol_a}%`;
    vol_dot.style.left = `${vol_a}%`;
    music.volume = vol_a / 100;
})



let back = document.getElementById('back');
let next = document.getElementById('next');

back.addEventListener('click', () => {
    index -= 1;
    if (index < 1) {
        index = Array.from(document.getElementsByClassName('songItem')).length;
    }
    musicElement = element.nextElementSibling;//to get next element from class playListPlays
    imgElement = musicElement.nextElementSibling;
    musicSrc = musicElement.value;
    imgSrc = imgElement.value;
    music.src = musicSrc;
    poster_master_play.src = imgSrc;
    music.play();
    let song_title = songs.filter((ele) => {
        return ele.id == index;
    })

    song_title.forEach(ele => {
        let { songName } = ele;
        title.innerHTML = songName;
    })
    makeAllPlays()

    document.getElementById(`${index}`).classList.remove('bi-play-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-fill');
    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index - 1}`].style.background = "rgb(105, 105, 170, .1)";

})
next.addEventListener('click', () => {
    index -= 0;
    index += 1;
    if (index > Array.from(document.getElementsByClassName('songItem')).length) {
        index = 1;
    }
    music.src = `assets/audio/${index}.mp3`;
    poster_master_play.src = `img/${index}.jpg`;
    music.play();
    let song_title = songs.filter((ele) => {
        return ele.id == index;
    })

    song_title.forEach(ele => {
        let { songName } = ele;
        title.innerHTML = songName;
    })
    makeAllPlays()

    document.getElementById(`${index}`).classList.remove('bi-play-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-fill');
    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index - 1}`].style.background = "rgb(105, 105, 170, .1)";

})


let left_scroll = document.getElementById('left_scroll');
let right_scroll = document.getElementById('right_scroll');
let pop_song = document.getElementsByClassName('pop_song')[0];

left_scroll.addEventListener('click', () => {
    pop_song.scrollLeft -= 330;
})
right_scroll.addEventListener('click', () => {
    pop_song.scrollLeft += 330;
})


let left_scrolls = document.getElementById('left_scrolls');
let right_scrolls = document.getElementById('right_scrolls');
let item = document.getElementsByClassName('item')[0];

left_scrolls.addEventListener('click', () => {
    item.scrollLeft -= 330;
})
right_scrolls.addEventListener('click', () => {
    item.scrollLeft += 330;
})


// -----------------------------favorite button-----------------

