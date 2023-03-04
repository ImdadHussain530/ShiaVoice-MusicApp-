<?php

use Illuminate\Support\Facades\Auth;
     function checkFav(){
        $productid=0;
        if(isset($_COOKIE['selected_music'])){
            $productid=$_COOKIE['selected_music'];
        }

        $countFavlist = 0;

        if(Auth::check()){
            $countFavlist = App\Models\Favlist::CountFavList($productid);

        }
        if ($countFavlist > 0){

            return '<i class="fas heart-red fa-heart "></i>';

        }else{
            return '<i class="far heart-white fa-heart "></i>';

        }




    }

?>
