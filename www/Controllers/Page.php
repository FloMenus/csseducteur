<?php 

namespace App\Controllers;

class Page 
{
    
    function show()
    {
        echo "Page n°". $_GET["id"];
    }
}