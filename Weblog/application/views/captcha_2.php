<?php
session_start();
/**
 * @author Thanh Long
 * @copyright 2011
 */
if(!empty($_SESSION['accept'])) 
        echo "<div>".$_SESSION['accept']."</div>";
?>
