<?php
define('PAGINATION_COUNT', 5);

function saveImage($photo,$folder_path){
    $image_name = $photo -> move($folder_path,$photo->hashName());
    return $image_name;
}

function DeleteImage($imageUrl,$searchAfter, $path){
    $strImage = Str::after($imageUrl, $searchAfter);
    $image = public_path($path.$strImage);
    return unlink($image);
}
