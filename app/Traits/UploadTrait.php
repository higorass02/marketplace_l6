<?php

namespace App\Traits;

trait UploadTrait
{
    public function imageUpload($images,$imageColumn = null){

        $uploadsImages = [];

        if(is_array($images)){
            foreach ($images as $image){
                $uploadsImages[] =[$imageColumn => $image->store('products','public')];
            }
        }else{
            $uploadsImages = $images->store('logo','public');
        }

        return $uploadsImages;
    }
}
