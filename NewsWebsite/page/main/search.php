<?php
if (isset($_POST["key"]) && !empty($_POST["key"])) {
	$key = $_POST["key"];
}
$sql_tin = "SELECT * FROM tin,nhom_tin,loai_tin WHERE tin.id_loaitin=loai_tin.id_loaitin and loai_tin.id_nhomtin=nhom_tin.id_nhomtin and tin.tieude LIKE '%$key%'";
$query_tin = mysqli_query($conn, $sql_tin);
?>

<section id="bricks" class="with-top-sep">
	<div class="row masonry">

		<!-- brick-wrapper -->
		<div class="bricks-wrapper">
		<div class="grid-sizer"></div>
<?php
while ($row_tin = mysqli_fetch_array($query_tin)) {
?>
			<article class="brick entry format-standard animate-this">

				<div class="entry-thumb">
					<a href="index.php?manage=news&id=<?php echo $row_tin['id_tin'] ?>" class="thumb-link">
						<img src="images/tin/<?php echo $row_tin['hinhdaidien'] ?>" alt="building">
					</a>
				</div>

				<div class="entry-text">
					<div class="entry-header">

						<div class="entry-meta">
							<span class="cat-links">
								<a href="#"><?php echo $row_tin['ten_nhomtin'] ?></a>
								<a href="#"><?php echo $row_tin['ten_loaitin'] ?></a>
							</span>
						</div>

						<h1 class="entry-title"><a href="index.php?manage=news&id=<?php echo $row_tin['id_tin'] ?>"><?php echo $row_tin['tieude'] ?></a></h1>

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
</section> <!-- bricks -->


