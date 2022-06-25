<?php
namespace App\Traits;
Trait Offer_trait
{
    public function img_upload($img,$path)
    {
        $file_extention=$img->getClientOriginalExtension();
        $file_name=time().'.'.$file_extention;
        $path=$path;
        $img->move($path,$file_name);
        return $file_name;
    }
}
