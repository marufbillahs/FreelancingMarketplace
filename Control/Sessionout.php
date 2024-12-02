<?php

Session_start();

if(Session_destroy())
{
    header("Location:../View/reg.php");
}

?>