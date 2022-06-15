<?php
if(isset($_GET['manage'])){
$temp = $_GET['manage'];
}else{
$temp='';
}
if ($temp=='categories') {
include("main/categories.php");
}elseif($temp=='about') {
include("main/about.php");
}elseif($temp=='contact') {
include("main/contact.php");
}elseif($temp=='news') {
include("main/news.php");
}elseif($temp=='hotnews') {
include("main/hotnews.php");
}elseif($temp=='search') {
include("main/search.php");
}else{
include("main/index.php");
}
?>