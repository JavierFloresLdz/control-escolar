<?php
    $link =mysqli_connect("localhost","root","");
    if ($link) {
        mysqli_select_db($link, "sistema");
        mysqli_query($link,"SET NAMES 'utf8'");
    }
