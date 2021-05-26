<?php

namespace App\Traits;
use Illuminate\Support\Str;
use PhpParser\Builder\Trait_;


Trait General
{
    function saveImage($image, $path){
        $photo = $image -> move($path, $image-> hashName());
        return $photo;
    }

    function DeleteImage($imagePath,$searchAfter, $path){
        $strImage = Str::after($imagePath, $searchAfter);
        $image = public_path($path.$strImage);
        return unlink($image);
    }


}
