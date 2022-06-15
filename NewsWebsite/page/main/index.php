<?php
$sql_tin = "SELECT * FROM posts WHERE posts.id ORDER BY RAND ()";
$query_tin = mysqli_query($conn, $sql_tin);
$sql_tin1 = "SELECT posts.id as postid , kinds.name , categories.cate_name , posts.title , posts.mota , posts.tacgia ,posts.image FROM posts ,kinds,categories WHERE posts.kind_id=kinds.id and kinds.cate_id=categories.id";
$sql_tin2= "SELECT * FROM kinds , posts where kind.id= post.kind_id";
//$sql_tin1 = "SELECT posts.image ,posts.title ,posts.view,posts.id ,, kinds.name,categories.name  FROM posts INNER JOIN kinds as kinds ON posts.kind_id = kinds.id INNER JOIN categories ON  kinds.cate_id=categories.id";
$query_tin1 = mysqli_query($conn, $sql_tin1);
$query_tin2 = mysqli_query($conn, $sql_tin2);
?>
<!-- masonry
   ================================================== -->
<section id="bricks">

	<div class="row masonry">

		<!-- brick-wrapper -->
		<div class="bricks-wrapper">

			<div class="grid-sizer"></div>

			<div class="brick entry featured-grid animate-this">
				<div class="entry-content">
					<div id="featured-post-slider" class="flexslider">
						<ul class="slides">
							<?php
							while ($row_tin = mysqli_fetch_array($query_tin)) {
							?>
								<li>

									<div class="featured-post-slide">

										<div class="post-background" style="background-image:url('images/tin/<?php echo $row_tin['image'] ?>');"></div>

										<div class="overlay"></div>

										<div class="post-content">
											<ul class="entry-meta">
												<li><?php echo $row_tin['created_at'] ?></li>
												<li><a href="#"><?php echo $row_tin['tacgia'] ?></a></li>
											</ul>

											<h1 class="slide-title"><a href="index.php?manage=news&id=<?php echo $row_tin['id'] ?>" title=""><?php echo $row_tin['title'] ?></a></h1>
										</div>

									</div>`

								</li> <!-- /slide -->
							<?php
							}
							?>

						</ul> <!-- end slides -->
					</div> <!-- end featured-post-slider -->
				</div> <!-- end entry content -->
			</div>
			<?php
			while ($row_tin1 = mysqli_fetch_array($query_tin1)) {
			?>
			<article class="brick entry format-standard animate-this">
				
				<div class="entry-thumb">
					<a href="index.php?manage=news&id=<?php echo $row_tin1['postid'] ?>" class="thumb-link">
						<img src="images/tin/<?php echo $row_tin1['image'] ?>" alt="building">
					</a>
				</div>

				<div class="entry-text">
					<div class="entry-header">

						<div class="entry-meta">
							<span class="cat-links">
								<a href="#"><?php echo $row_tin1['cate_name'] ?></a>
								<a href="#"><?php echo $row_tin1['name'] ?></a>
							</span>
						</div>

						<h1 class="entry-title"><a href="index.php?manage=news&id=<?php echo $row_tin1['postid'] ?>"><?php echo $row_tin1['title'] ?></a></h1>

					</div>
					<div class="entry-excerpt">
					<?php echo $row_tin1['mota'] ?>
					</div>
				</div>
			
			</article> <!-- end article -->
			<?php
			}
			?>
			

		</div> <!-- end brick-wrapper -->

	</div> <!-- end row -->



</section> <!-- end bricks -->
</body>

</html>