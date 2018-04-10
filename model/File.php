<?php
namespace homework5;

use Intervention\Image\ImageManagerStatic as Image;

class File
{
    public function store($file)
    {
        $img = Image::make($file['tmp_name']);
        $img->resize(350, 350)
            ->save("photos/".$file['name']);
    }
    public function check($path)
    {
        if (is_file($path)) {
            return true;
        }
        return false;
    }
    public function delete($path)
    {
        unlink($path);
    }
}