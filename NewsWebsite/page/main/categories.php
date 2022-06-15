<?php

$sql_nhomtin = "SELECT * FROM categories WHERE categories.id='$_GET[id]' LIMIT 1";
$sql_loaitin = "SELECT * FROM categories,kinds where kinds.cate_id=categories.id and categories.id='$_GET[id]'";

$query_nhomtin = mysqli_query($conn, $sql_nhomtin);
$query_loaitin = mysqli_query($conn, $sql_loaitin);

$row_loaitin = mysqli_fetch_array($query_nhomtin);

$row_nhomtin = mysqli_fetch_array($query_nhomtin);
$sql_tin = "SELECT * FROM posts,kinds,categories WHERE posts.kind_id=kinds.id and kinds.cate_id=categories.id and kinds.id='$_GET[id_loaitin]'";
$query_tin = mysqli_query($conn, $sql_tin);
?>
<!-- page header
   ================================================== -->
<section id="page-header">
	<div class="row current-cat">
		<div class="col-full">
<?php while($row_nhomtin = mysqli_fetch_array($query_nhomtin)){
		?>
		<h1>Danh mục: <?php echo $row_nhomtin['cate_name']?></h1>

	<?php }?>
			<?php
			while ($row_loaitin = mysqli_fetch_array($query_loaitin)) {
			?>
				<div class="entry-text">
					<div class="entry-meta">
						<span class="cat-links">
							<a href="index.php?manage=categories&id=<?php echo $row_loaitin['kind_id'] ?>&id_loaitin=<?php echo $row_loaitin['id'] ?>"><?php echo $row_loaitin['name'] ?></a>
						</span>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>


<!-- masonry
   ================================================== -->
<section id="bricks" class="with-top-sep">

	<div class="row masonry">

		<!-- brick-wrapper -->
		<div class="bricks-wrapper">

			<div class="grid-sizer"></div>

			<?php
			while ($row_tin = mysqli_fetch_array($query_tin) && $row_loaitin = mysqli_fetch_array($query_loaitin) &&$row_nhomtin = mysqli_fetch_array($query_nhomtin)	) {
			?>
				<article class="brick entry format-standard animate-this">
					<div class="entry-thumb">
						<a href="index.php?manage=news&id=<?php echo $row_tin['id'] ?>" class="thumb-link">
							<img src="images/tin/<?php echo $row_tin['image'] ?>" alt="building">
						</a>
					</div>
					<div class="entry-text">
						<div class="entry-header">
							<div class="entry-meta">
								<span class="cat-links">
									<a href="index.php?manage=categories&id=<?php echo $row_loaitin['cate_id'] ?>"><?php echo $row_nhomtin['cate_name'] ?></a>
									<a href="#"><?php echo $row_tin['ten_loaitin'] ?></a>
								</span>
							</div>
							<h1 class="entry-title"><a href="index.php?manage=news&id=<?php echo $row_tin['id'] ?>"><?php echo $row_tin['title'] ?></a></h1>
						</div>
						<div class="entry-excerpt">
							<?php echo $row_tin['mota'] ?>
						</div>
					</div>
				</article> <!-- end article -->
			<?php
			}
			?>



		</div> <!-- end brick-wrapper -->

	</div> <!-- end row -->

	<div class="row">

		<nav class="pagination">
			<span class="page-numbers prev inactive">Prev</span>
			<span class="page-numbers current">1</span>
			<a href="#" class="page-numbers">2</a>
			<a href="#" class="page-numbers">3</a>
			<a href="#" class="page-numbers">4</a>
			<a href="#" class="page-numbers">5</a>
			<a href="#" class="page-numbers">6</a>
			<a href="#" class="page-numbers">7</a>
			<a href="#" class="page-numbers">8</a>
			<a href="#" class="page-numbers">9</a>
			<a href="#" class="page-numbers next">Next</a>
		</nav>

	</div>

</section> <!-- bricks -->
