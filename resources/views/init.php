<?php
$root_path = "/willie-online-new";
$logged_in = false;
$viewing_as = '';

if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION) && isset($_SESSION['user_id']) && $_SESSION['active'] ?? 0 && isset($_SESSION['type'])) {
    $logged_in = true;
    if($_SESSION['type'] == 'customer' || ($_SESSION['type'] == 'supplier' && $_SESSION['viewing_as'] ?? '' == 'customer')) {
        $viewing_as = 'customer';
    } 
    if ($_SESSION['type'] == 'supplier' && $_SESSION['viewing_as'] ?? '' == 'supplier') {
        $viewing_as = 'supplier';
    }
}
?>