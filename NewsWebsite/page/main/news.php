<?php
$sql_tin = "SELECT * FROM posts WHERE posts.id='$_GET[id]'";
$query_tin = mysqli_query($conn, $sql_tin);
$sql_binhluan = "SELECT * FROM binh_luan,posts WHERE posts.id=binh_luan.post_id and binh_luan.post_id='$_GET[id]' ";
$query_binhluan = mysqli_query($conn, $sql_binhluan);

$sql_tin1 = "SELECT * FROM tin WHERE posts.id='$_GET[id]'";
$query_tin1 = mysqli_query($conn, $sql_tin);
$row_tin1 = mysqli_fetch_array($query_tin1);

$sql_tongcmt = "SELECT post_id, COUNT(id)AS so_luong_cmt FROM binh_luan where binh_luan.post_id='$_GET[id]' ";
$query_tongcmt = mysqli_query($conn, $sql_tongcmt);
?>
<!-- content
   ================================================== -->

<section id="content-wrap" class="blog-single">

	<div class="row">
		<div class="col-twelve">
			<?php
			while ($row_tin = mysqli_fetch_array($query_tin)) {
			?>
				<article class="format-standard">

					<div class="content-media">
						<div class="post-thumb">
							<img src="../../../DzodNews/public/Backend/dist/img/upload/post/<?php echo $row_tin['image'] ?>">
						</div>
					</div>

					<div class="primary-content">

						<h1 class="page-title"><?php echo $row_tin['title'] ?></h1>

						<ul class="entry-meta">
							<li class="date"><?php echo $row_tin['created_at'] ?></li>
							<li class="cat"><a href="#"><?php echo $row_tin['tacgia'] ?></a><a href="#"><?php echo $row_tin['view'] ?></a></li>
						</ul>

						<p><?php echo $row_tin['content'] ?></p>



				</article>

			<?php
			}
			?>
		</div> <!-- end col-twelve -->
	</div> <!-- end row -->


	<div class="comments-wrap">
		<div id="comments" class="row">
			<div class="col-full">
			<?php
			while ($row_tongcmt = mysqli_fetch_array($query_tongcmt)) {
			?>
				<h3>Tổng bình luận:<?php echo $row_tongcmt['so_luong_cmt'] ?></h3>
			<?php
			}
			?>
				<!-- commentlist -->
				<ol class="commentlist">

					<li class="depth-1">
						<?php
						while ($row_binhluan = mysqli_fetch_array($query_binhluan)) {
						?>
							<div class="comment-content">

								<div class="comment-info">
									<cite><?php echo $row_binhluan['email'] ?></cite>

									<div class="comment-meta">
										<time class="comment-time" datetime="2014-07-12T23:05"><?php echo $row_binhluan['created_at'] ?></time>

									</div>
								</div>

								<div class="comment-text">
									<p><?php echo $row_binhluan['noidungbinhluan'] ?></p>
								</div><?php
									}
										?>
					</li>

			</div>


			</ol> <!-- Commentlist End -->

			<!-- respond -->
			<div class="respond">

				<h3>Bình luận</h3>

				
				<form method="POST" action="commentcontroller.php">
				
					<fieldset>



						<div class="form-field">
							<input name="email" type="email" id="email" class="full-width" placeholder="Email" value="">
						</div>
						
						<div class="form-field">
							<input name="id" type="hidden" id="id" class="full-width" placeholder="ID" value="<?php echo $row_tin1['id']?>">
						</div>
					

						<div class="message form-field">
							<textarea name="noidung" id="noidung" class="full-width" placeholder="Nội dung"></textarea>
						</div>

						<button type="submit" class="submit button-primary" id="gui" name="gui">Gửi</button>
						

					</fieldset>
				</form> <!-- Form End -->

			</div> <!-- Respond End -->

		</div> <!-- end col-full -->
	</div> <!-- end row comments -->
	</div> <!-- end comments-wrap -->

</section> <!-- end content -->