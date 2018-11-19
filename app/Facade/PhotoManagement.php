<?php
/**
 * Created by PhpStorm.
 * User: Ludovic
 * Date: 22/04/2018
 * Time: 15:10
 */

namespace App\Facade;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class PhotoManagement
{
    public function save(UploadedFile $image, String $name)
    {
        $name = str_replace(' ','_',$name);
        $photoName = $name.'_'.time().'.jpg';
        $this->square_thumbnail_with_proportion($image,config('images.path').$photoName,500);
       return $photoName;
    }

    public function load(String $photoName)
    {
        return asset(config('images.path').$photoName);
    }

    function square_thumbnail_with_proportion($src_file,$destination_file,$square_dimensions,$jpeg_quality=90)
    {
        // Step one: Rezise with proportion the src_file *** I found this in many places.
        $src_img=imagecreatefromjpeg($src_file);

        $old_x=imageSX($src_img);
        $old_y=imageSY($src_img);

        if($old_x>$old_y)
        {
            $squareSize=$old_y;
        }
        else
        {
            $squareSize=$old_x;
        }

        // we create a new image with the new dimmensions
        $smaller_image_with_proportions=ImageCreateTrueColor($squareSize,$squareSize);

        // resize the big image to the new created one
        /*var_dump(($old_x-$squareSize)/2);
        var_dump(($old_y-$squareSize)/2);
        var_dump($squareSize);
        die;*/
        imagecopyresampled($smaller_image_with_proportions,$src_img,0,0,($old_x-$squareSize)/2 ,($old_y-$squareSize)/2, $squareSize, $squareSize, $squareSize,$squareSize);

        // *** End of Step one ***

        /*// Step Two (this is new): "Copy and Paste" the $smaller_image_with_proportions in the center of a white image of the desired square dimensions

        // Create image of $square_dimensions x $square_dimensions in white color (white background)
        $final_image = imagecreatetruecolor($square_dimensions, $square_dimensions);
        $bg = imagecolorallocate ( $final_image, 255, 255, 255 );
        imagefilledrectangle($final_image,0,0,$square_dimensions,$square_dimensions,$bg);

        // need to center the small image in the squared new white image
        if($thumb_x>$thumb_y)
    {
        // more width than height we have to center height
        $dst_x=0;
        $dst_y=($square_dimensions-$thumb_y)/2;
    }
    elseif($thumb_y>$thumb_x)
    {
        // more height than width we have to center width
        $dst_x=($square_dimensions-$thumb_x)/2;
        $dst_y=0;

    }
    else
    {
        $dst_x=0;
        $dst_y=0;
    }

        $src_x=0; // we copy the src image complete
        $src_y=0; // we copy the src image complete

        $src_w=$thumb_x; // we copy the src image complete
        $src_h=$thumb_y; // we copy the src image complete

        $pct=100; // 100% over the white color ... here you can use transparency. 100 is no transparency.

        imagecopymerge($final_image,$smaller_image_with_proportions,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct);*/

        imagejpeg($src_img,$destination_file.'original',$jpeg_quality);
        imagejpeg($smaller_image_with_proportions,$destination_file,$jpeg_quality);
        //imagejpeg($final_image,$destination_file.'2',$jpeg_quality);

        // destroy aux images (free memory)
        imagedestroy($src_img);
        imagedestroy($smaller_image_with_proportions);
        //imagedestroy($final_image);
    }
}