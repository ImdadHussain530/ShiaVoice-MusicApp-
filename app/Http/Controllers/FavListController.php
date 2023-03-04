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
    public function show($id)
    {
        //
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
        if($request->ajax()){
            $data=$request->all();
            $countFavlist=Favlist::CountFavList($data['product_id']);

            $favList=new Favlist;
            if($countFavlist==0){
                $favList->music_id=$data['product_id'];
                $favList->user_id=$data['user_id'];
                $favList->save();

                return response()->json( ['action'=>'add','message'=>'Music add successfully to favorite list']);

            }else{
                Favlist::where(['user_id'=>Auth::id(),'music_id'=>$data['product_id']])->delete();
                return response()->json(['action'=>'remove','message'=>'Music remove successfully from favorite list']);
            }
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
