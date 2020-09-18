<?php
    // Simple page redirect
    function redirect($page)
    {
        header('location: ' . URLROOT . '/' . $page);
    }

//Simple page redirect
function redirect($page){
    header("Location: " . URLROOT . "/" . $page);
}

