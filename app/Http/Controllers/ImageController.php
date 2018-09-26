<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image as Image;

class ImageController extends Controller
{
    private $_image;
    public function __construct(Image $image)
    {
        $this->_image = $image;
    }

    public function create($result,$id,$about)
    {
        $i = 0;
        foreach ($result as $key => $value) {

            // check if api array has image
            if (isImages($value)){

                // check the image type
                $image_type = imageType($key);
                if ($image_type == 'fanart'){
                 $type = $image_type."".++$i;

                    // save image in folder and return the path
                    $image_path = saveImages("$value", "$id","$about","$type");
                }else{
                    $type = $image_type;

                    // save image in folder and return the path
                    $image_path = saveImages("$value", "$id","$about","$type");
                }

                //Send data to image model
                $this->_image->insert($image_path,$id,$about,$type);
            }
        }
    }

}
