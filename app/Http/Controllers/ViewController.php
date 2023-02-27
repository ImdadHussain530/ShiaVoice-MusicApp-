<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
// --------Start---------User-views------------------------
    function dashboard(){
        $user=User::where('id','=',session()->get('loginid'))->first();
        $musics=Music::with('artist')->get();
        $popularArtists=Artist::all();
        $popularmusics=Music::where('artist_id','LIKE','%'.''.'%' )->get();
        $data=compact('musics','popularmusics','popularArtists','user');
        return view('index')->with($data);
    }
    function search(Request $request){
        $search= $request->search;
        $user=User::where('id','=',session()->get('loginid'))->first();
        $musics=Music::with('artist')->get();
        $popularArtists=Artist::all();
        $popularmusics=Music::select("*")
        ->join('artists','artists.id','=','musics.artist_id')
        ->where('title','LIKE','%'."$search".'%')
        ->orwhere('artist_name','LIKE','%'."$search".'%')
        ->get();
        $data=compact('musics','popularmusics','popularArtists','user');
        return view('search')->with($data);
    }
// --------End---------User-views------------------------

// --------Start---------Admin-views------------------------

    function admin(){
        return view('admin.index');
    }

    function music(){
        $musics=Music::with('artist')->get();
        $data=compact('musics');
        return view('admin.music')->with($data);
    }
    function artist(){
        $artists=Artist::all();
        $data=compact('artists');
        return view('admin.artist')->with($data);
    }
// --------End---------Admin-views------------------------
}
