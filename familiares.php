<?php
if(!isset($_GET['id'])) header('Location: index.php');

include __DIR__.('\templates\partials\header_temp.php');
include __DIR__.('\templates\familiares_temp.php');
?>