<?php
/**
 * Created by PhpStorm.
 * User: omer
 * Date: 25.04.2018
 * Time: 14:53
 */
$baglanti=mysqli_connect("localhost","root","","karaca");
mysqli_set_charset($baglanti,"utf8");
return $baglanti;
?>