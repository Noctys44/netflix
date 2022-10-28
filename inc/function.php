<?php

function userConnected() {
    if(isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

?>