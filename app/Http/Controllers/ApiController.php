<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Music;
use App\Models\Artist;
use App\Models\Favlist;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function getAllMusics($id=null){
        if($id!=null){
            $musics=Music::select("musics.*","artist_name")
            ->join('artists','artists.id','=','musics.artist_id')
            ->orderBy('id')
            ->find($id);
            return $musics;


        }else{
            $musics=Music::select("musics.*","artist_name")
            ->join('artists','artists.id','=','musics.artist_id')
            ->orderBy('id')
            ->get();
            return $musics;

        }


    }
    function getAllArtists($artist_name=null){
        if($artist_name!=null){
            $artist=Artist::where('artist_name','like',"%".$artist_name."%")->get();
            return $artist;
        }else{
            $artist=Artist::all();
            return $artist;

        }

    }
    function getAllUsers($id=null){
        if($id!=null){
            $musics=User::find($id);
            return $musics;


        }else{
            $musics=User::get();
            return $musics;

        }


    }
    function getFavlist(){
        $favlist=Favlist::join('users','users.id','=','favlists.user_id')
        ->join('musics','musics.id','=','favlists.music_id')
        ->select('musics.*','users.*','favlists.*')
        ->get();
        return $favlist;
    }
}
