<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    private $description;
    public function makeDescription($baseText)
    {
        $this->description = $baseText;
        $this->description = strip_tags($this->description);
        $this->description = substr($this->description, 0, 250);
        $this->description = rtrim($this->description, "!,.-");
        $this->description = substr($this->description, 0, strrpos($this->description, ' ')) . "...";
        return $this->description;
    }
}
