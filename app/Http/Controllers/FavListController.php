<?php

namespace App\Http\Controllers;

use App\Models\Favlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }
    public function getshow()
    {
        // $music=Favlist::where('user_id','=',Auth::id())->get();
        $music=Favlist::select("musics.*","artist_name")
        ->join('musics','musics.id','=','favlists.music_id')
        ->join('artists','artists.id','=','musics.artist_id')
        ->where('user_id','=',Auth::id())
        ->get();
        $data=compact('music');
        // echo "<pre>";
        // print_r($data);
        return response()->json($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $countFavlist = Favlist::CountFavList($data['music_id']);

            $favList = new Favlist;
            if ($countFavlist == 0) {
                $favList->music_id = $data['music_id'];
                $favList->user_id = $data['user_id'];
                $favList->save();

                return response()->json(['action' => 'add', 'message' => 'Music add successfully to favorite list']);
            } else {
                Favlist::where(['user_id' => Auth::id(), 'music_id' => $data['music_id']])->delete();
                return response()->json(['action' => 'remove', 'message' => 'Music remove successfully from favorite list']);
            }
        }
    }

    public static function checkFav()
    {

        if (isset($_COOKIE['selected_music'])) {
            $musicid = $_COOKIE['selected_music'];
        } else {
            return '<i class="far heart-white fa-heart "></i>';
        }

        $countFavlist = 0;

        if (Auth::check()) {
            $countFavlist = Favlist::CountFavList($musicid);
        }
        if ($countFavlist > 0) {
            setcookie('selected_music', '0');
            return '<i class="fas heart-red fa-heart "></i>';
        } else {
            setcookie('selected_music', '0');
            return '<i class="far heart-white fa-heart "></i>';
        }
    }
    public static function checkFavUsingId($music_id)
    {

        // echo setcookie('selected_music',$music_id); setcoolkie not work for immediatly using the cookie.because setcookie has natue it store when page load that why we assign directly.
        $_COOKIE['selected_music'] = $music_id;

        if (isset($_COOKIE['selected_music'])) {
            $musicid = $_COOKIE['selected_music'];
        } else {
            return '<i class="far heart-white fa-heart "></i>';
        }

        $countFavlist = 0;

        if (Auth::check()) {
            $countFavlist = Favlist::CountFavList($musicid);
        }
        if ($countFavlist > 0) {
            setcookie('selected_music', '0');
            return '<i class="fas heart-red fa-heart "></i>';
        } else {
            setcookie('selected_music', '0');
            return '<i class="far heart-white fa-heart "></i>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
