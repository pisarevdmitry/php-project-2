<?php
namespace homework5;

class View
{
    public function render(String $filename, array $data)
    {

        require_once "./views/".$filename.".php";
    }
}