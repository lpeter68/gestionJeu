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
        $image->storeAs(config('images.path'),$photoName,'public');
        return $photoName;
    }

    public function load(String $photoName)
    {
        return asset('uploads/'.$photoName);
    }
}