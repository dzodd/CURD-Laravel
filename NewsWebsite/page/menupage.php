<?php
$sql_nhomtin = "SELECT * FROM categories ORDER BY id ASC ";
$sql_nhomtin1 = "SELECT * FROM categories ORDER BY id ASC ";
$sql_loaitin = "SELECT id FROM kinds LIMIT 1";
$query_nhomtin = mysqli_query($conn, $sql_nhomtin);
$query_nhomtin1 = mysqli_query($conn, $sql_nhomtin);
$query_loaitin = mysqli_query($conn, $sql_loaitin);
$row_loaitin = mysqli_fetch_array($query_loaitin);
?>


<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

	<!--- basic page needs
   ================================================== -->
	<meta charset="utf-8">
	<title>News</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
   ================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/vendor.css">
	<link rel="stylesheet" href="css/main.css">


	<!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

	<!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

	<!-- header 
   ================================================== -->
	<header class="short-header">

		<div class="gradient-block"></div>

		<div class="row header-content">

			<div class="logo">
				<a href="index.php">News</a>
			</div>

			<nav id="main-nav-wrap">
				<ul class="main-navigation sf-menu">
					<li class="current"><a href="index.php" title="">Trang chủ</a></li>
					<li class="has-children">
						<a href="#" title="">Danh mục</a>
						<ul class="sub-menu">
							<li class="has-children">
								<?php
								while ($row_nhomtin = mysqli_fetch_array($query_nhomtin)) {
								?>
									<a href="index.php?manage=categories&id=<?php echo $row_nhomtin['id'] ?>&id_loaitin=<?php echo $row_loaitin['id'] ?>"><?php echo $row_nhomtin['cate_name'] ?></a>
								<?php
								}
								?>
							</li>
						</ul>
					</li>
					<li><a href="index.php?manage=about" title="">Về chúng tôi</a></li>
					<li><a href="index.php?manage=contact" title="">Liên hệ</a></li>
				</ul>
			</nav> <!-- end main-nav-wrap -->

			<div class="search-wrap">

				<form role="search" method="POST" class="search-form" action="index.php?manage=search">
					<label>
						<span class="hide-content">Tìm kiếm:</span>
						<input type="search" class="search-field" placeholder="Nhập từ khóa" 
						value="" name="key" title="Search for:" autocomplete="off">
					</label>
					<input type="submit" class="search-submit" value="Search">
				</form>

				<a href="#" id="close-search" class="close-btn">Đóng</a>

			</div> <!-- end search wrap -->

			<div class="triggers">
				<a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
				<a class="menu-toggle" href="#"><span>Menu</span></a>
			</div> <!-- end triggers -->

		</div>

	</header> <!-- end header -->