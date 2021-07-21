<?php
$root_path = "/willie-online-new";
if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION) && isset($_SESSION['user_id']) && $_SESSION['active'] ?? 0 && isset($_SESSION['type']) && $_SESSION['type'] == 'supplier' && $_SESSION['viewing_as'] == 'supplier') {
    // Continue..
} else {
    header('location:../auth/logout2.blade.php');
}

if($_SESSION['viewing_as'] == 'customer') {
    header('location: ../shop/index.blade.php');
}

if ($_SESSION['type'] == 'customer') {
    header('location:../404.blade.php');
}
?>
