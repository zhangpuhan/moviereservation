<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($con,"select * from movie where movie_id='".$_SESSION['movie']."'");
	$movie=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<center>
			<h3>BOOKINGS</h3>
		</center>
				<div class="section group">
					<div class="about span_1_of_2">	
						<?php include('msgbox.php');?>
						<?php
				$bk=mysqli_query($con,"select * from bookings inner join theatre on bookings.t_id = theatre.id
					inner join screens on bookings.screen_id = screens.screen_id
					where user_id='".$_SESSION['user']."' order by ticket_date");

				if(mysqli_num_rows($bk))
				{
					?>
					<table class="table table-bordered">
						<thead>
						<th>Booking Id</th>
						<th>Movie</th>
						<th>Theatre</th>
						<th>Screen</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>Seats</th>
						<th>Amount</th>
						<th>Status</th>
						</thead>
						<tbody>
						<?php
						while($bkg=mysqli_fetch_array($bk))
						{
							$m=mysqli_query($con,"select * from movie where movie_id=(select movie_id from shows where s_id='".$bkg['show_id']."')");
							$mov=mysqli_fetch_array($m);
							$st=mysqli_query($con,"select * from show_time where st_id=(select st_id from shows where s_id='".$bkg['show_id']."')");
							$stm=mysqli_fetch_array($st);
							?>
							<tr>
    						    <td>
								<?php echo $bkg['ticket_id'];?>
								</td>								
								<td>
									<?php echo $mov['movie_name'];?>
								</td> 
								<td>
									<?php echo $bkg['name'];?>
								</td>
								<td>
									<?php echo $bkg['screen_name'];?>
								</td>
								<td>
									<?php echo $bkg['ticket_date'];?>
								</td>
								<td>
									<?php echo $stm['start_time'];?>
								</td>
								<td>
									<?php echo $bkg['no_seats'];?>
								</td>
								<td>
								    $ <?php echo $bkg['amount'];?> 
								</td> 

								<td>
									<?php  if($bkg['ticket_date']<date('Y-m-d'))
									{
										?>
										<i class="glyphicon glyphicon-ok"></i>
										<?php
									}
									else
									{?>
									<a href="cancel.php?id=<?php echo $bkg['book_id'];?>">Cancel</a>
									<?php
									}
									?>
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
				}
				else
				{
					?>
					<h3>No Previous Bookings</h3>
					<?php
				}
				?>
					</div>			
				
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("Rs "+amount);
		$('#hm').val(amount);
	});
</script>