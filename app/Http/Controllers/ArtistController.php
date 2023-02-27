<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add-artist');
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
        $request->validate([
            'artist_name'=>'required|regex:/^[a-zA-Z ]*$/',
            'artist_photo'=>'required|mimes:jpeg,jpg,png,gif',
            'feature'=>'required',
            'active'=>'required'
        ]);

        $artist_photo = $request->file('artist_photo');

        if ($artist_photo != "") {

            $file = request()->file('artist_photo'); //get temp_location from file
            $ext = $file->clientExtension();   //get jpg extension
            $newArtistPhotoName = "artistphoto".time() . "." . $ext; //make a new name using ext
            //many more funtion available like this storeAs,store,...
            $file->storeAs('Artists', $newArtistPhotoName, ['disk' => 'uploadedArtistPhoto']);
        }

            $artist=new Artist();
            $artist->artist_name=$request['artist_name'];
            $artist->artist_photo="$newArtistPhotoName";
            $artist->feature=$request['feature'];
            $artist->active=$request['active'];
            $artist->save();

            $url=route('artist');
            return redirect($url);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artists=Artist::find($id);
        $data=compact('artists');
        return view('admin.update-artist')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'artist_name'=>'required|regex:/^[a-zA-Z ]*$/',
            'newPhoto'=>'mimes:jpeg,jpg,png,gif',
            'feature'=>'required',
            'active'=>'required'
        ]);
        $id=$request->id;
        $artist_name=$request->artist_name;
        $oldPhoto=$request->oldPhoto;
        $newPhoto=$request->newPhoto;
        $feature=$request->feature;
        $active=$request->active;

        if($newPhoto!=""){
            if($oldPhoto!=""){

                $unlink=unlink(public_path("assets/img/Artists/".$oldPhoto));
                if($unlink==true){
                    $file = request()->file('newPhoto'); //get temp_location from file
                    $ext = $file->clientExtension();   //get jpg extension
                    $newArtistPhotoName = "artistphoto".time() . "." . $ext; //make a new name using ext
                    //many more funtion available like this storeAs,store,...
                    $file->storeAs('Artists', $newArtistPhotoName, ['disk' => 'uploadedArtistPhoto']);
                    $artist_photo=$newArtistPhotoName;

                }else{
                    //not deleted old photo
                    exit();

                }

            }else{

                $file = request()->file('newPhoto'); //get temp_location from file
                $ext = $file->clientExtension();   //get jpg extension
                $newArtistPhotoName = "artistphoto".time() . "." . $ext; //make a new name using ext
                //many more funtion available like this storeAs,store,...
                $file->storeAs('Artists', $newArtistPhotoName, ['disk' => 'uploadedArtistPhoto']);
                $artist_photo=$newArtistPhotoName;
            }

        }else{
            $artist_photo=$oldPhoto;
        }

            $artist=Artist::find($id);
            $artist->artist_name="$artist_name";
            $artist->artist_photo="$artist_photo";
            $artist->feature=$feature;
            $artist->active=$active;
            $artist->update();

            $url=route('artist');
            return redirect($url);

    }
    public function delete($id)
    {
        $artist=Artist::find($id);
        $artist_photo=$artist->artist_photo;
        if($artist_photo!=""){

            $unlink=unlink(public_path("assets/img/Artists/".$artist_photo));
            if($unlink!=true){

                //not deleted old photo
                $url=route('artist');
                return redirect($url);
            }
        }
        $artist->delete();

        $url=route('artist');
        return redirect($url);


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {

        //
    }
}
