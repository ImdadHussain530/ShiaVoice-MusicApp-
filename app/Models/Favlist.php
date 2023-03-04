<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favlist extends Model
{
    use HasFactory;
    public static function CountFavList($product_id){
        $countFavlist=Favlist::where(['user_id'=>Auth::id(),'music_id'=>$product_id])->count();
        return $countFavlist;

    }


}
