<?php include('header.php');?>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<center>
			<h3>Trending Movies!</h3>
			
			<?php
          	 $today=date("Y-m-d");
          	 $qry2=mysqli_query($con,"select * from movie order by rand() limit 4");
		
          	  while($m=mysqli_fetch_array($qry2))
                   {
                    ?>
                    
                    <div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						  	<div class="single">
						  		<?php
						
						?>
						  		<a href="about.php?id=<?php echo $m['movie_id'];?>"><img src="<?php echo $m['image'];?>" alt="error" /></a>
						  	</div>
						  	<div class="movie-text">
						  		<h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id'];?>"><?php echo $m['movie_name'];?></a></h4>
						  		Cast:<Span class="color2"><?php echo $m['cast'];?></span><br>
						  		Description: <span" class="color2"><?php echo $m['desc'];?></span><br>
						  		<a href="<?php echo $m['video_url']; ?>" target="_blank" class="watch_but">Watch Trailer</a>
						  		<br>
						  		<br>
						  		
						  	</div>
		  				</div>
		  		</div>
		  		
  	    <?php
  	    	}
  	    	?>
			</center>
			</div>
				<div class="clear"></div>		
			</div>
			<?php include('footer.php');?>