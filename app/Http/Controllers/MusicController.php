<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Artist;
class MusicController extends Controller
{
    function index()
    {
        $artists=Artist::all();
        $data=compact('artists');
        return view('admin.add-music')->with($data);
    }
    function store(Request $request)
    {
        // validations
        $request->validate([
            'title'=>'required|regex:/^[a-zA-Z -]*$/',
            'artist_id'=>'required',
            'music'=>'required',
            'music_type'=>'required',
            'poster'=>'required|mimes:jpeg,jpg,png,gif',
            'feature'=>'required',
            'active'=>'required'
        ]);

    //--------------------------------------------------------------------------------------------------
        $music = $request->file('music');
        $poster = $request->file('poster');

        if ($music != "") {

            //store music file:

            //direct method Manually making folder
            // $destinationPath='assets';
            // $music= $request->music->getClientOriginalName();
            // $request->music->move(public_path($destinationPath), $music);

            // automatic make a folder
            $file = $request->file('music'); //get temp_location from file
            $ext = $file->clientExtension();  //get mp3 extension
            echo $NewMusicName = "music".time() . "." . $ext; //make a new name using ext
            //many more funtion available like this storeAs,store,...
            $file->storeAs('uploaded', $NewMusicName, ['disk' => 'uploadedAudio']); //disk and path config to config/filesystems.php


            if ($poster != "") {

                $file = request()->file('poster'); //get temp_location from file
                $ext = $file->clientExtension();   //get jpg extension
                echo $newPosterName = "poster".time() . "." . $ext; //make a new name using ext
                //many more funtion available like this storeAs,store,...
                $file->storeAs('uploaded', $newPosterName, ['disk' => 'uploadedPoster']);
            }

//--------------------------------------------------------------------------------------------------
            //store to database

            $music=new Music();
            $music->title=$request['title'];
            $music->artist_id=$request['artist_id'];
            $music->music="$NewMusicName";
            $music->music_type=$request['music_type'];
            $music->poster="$newPosterName";
            $music->feature=$request['feature'];
            $music->active=$request['active'];
            $music->save();
            return redirect(route('music'));

        } else {
            return "no music available";
        }





    }
    function edit($id){
        $musics=Music::find($id);
        $artists=Artist::all();
        $data=compact('musics','artists');
        return view('admin.update-music')->with($data);

    }
    function update(Request $request){
        $request->validate([
            'title'=>'required|regex:/^[a-zA-Z -]*$/',
            'artist_id'=>'required',
            'newMusic'=>'',
            'music_type'=>'required',
            'newPoster'=>'mimes:jpeg,jpg,png,gif',
            'feature'=>'required',
            'active'=>'required'
        ]);

        $id=$request->id;
        $title=$request->title;
        $oldMusic=$request->oldMusic;
        $newMusic=$request->newMusic;
        $artist_id=$request->artist_id;
        $music_type=$request->music_type;
        $oldPoster=$request->oldPoster;
        $newPoster=$request->newPoster;
        $feature=$request->feature;
        $active=$request->active;



         function poster($old,$new){
             $oldPoster=$old;
             $newPoster=$new;



            if($newPoster!=""){
                if($oldPoster!=""){
                    $unlink2=unlink(public_path('assets/img/uploaded/'.$oldPoster));
                    if($unlink2==false){
                        return false;

                    }

                }

                $file = request()->file('newPoster');
                $ext = $file->clientExtension();
                $newPosterName = "poster".time() . "." . $ext;
                $file->storeAs('uploaded', $newPosterName, ['disk' => 'uploadedPoster']);
                $poster=$newPosterName;
                return $poster;

            }else{

                $poster=$oldPoster;
                return $poster;

            }
        }

        if($newMusic!=""){


            $checkPoster=poster($oldPoster,$newPoster);
            if($checkPoster==false){
                return redirect(route('music'));


            }else{

                if($oldMusic!=""){
                    $unlink=unlink(public_path('assets/audio/uploaded/'.$oldMusic));
                    if($unlink==false){
                        return redirect(route('music'));

                    }
                }

                $file = $request->file('newMusic'); //get temp_location from file
                $ext = $file->clientExtension();  //get mp3 extension
                $NewMusicName = "music".time() . "." . $ext; //make a new name using ext
                $file->storeAs('uploaded', $NewMusicName, ['disk' => 'uploadedAudio']);

                $poster=$checkPoster;
                $musicName=$NewMusicName;

            }


        }else{


            $checkPoster=poster($oldPoster,$newPoster);

            if($checkPoster==false){
                return redirect(route('music'));

            }

            $poster=$checkPoster;
            $musicName=$oldMusic;
        }


        $music=Music::find($id);
        $music->title="$title";
        $music->artist_id=$artist_id;
        $music->music="$musicName";
        $music->music_type="$music_type";
        $music->poster="$poster";
        $music->feature=$feature;
        $music->active=$active;
        $music->update();
        return redirect(route('music'));


    }

    public function delete($id){
        $music=Music::find($id);
        $musicX=$music->music;
        $poster=$music->poster;

        if($musicX!=""){
            $unlink=unlink(public_path('assets/audio/uploaded/'.$musicX));
                    if($unlink==false){
                        return redirect(route('music'));

                    }

        }
        if($poster!=""){
            $unlink2=unlink(public_path('assets/img/uploaded/'.$poster));
            if($unlink2==false){
                return redirect(route('music'));

            }

        }

        $delete=$music->delete();
        return redirect(route('music'));


    }
}
