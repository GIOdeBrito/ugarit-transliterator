<?php

if(isset($_GET['w']) && isset($_GET['h']))
{
    
}

header('Content-type: image/webp');

readfile('public/'.'magnifier'.'.webp');

die();

?>