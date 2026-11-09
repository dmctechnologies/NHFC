<?php include "header.php"; ?> 
			<div id="page-wrapper">
				<div class="graphs">
					<div class="col_3">
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-users"></i>
								<div class="stats">
								  <h5>45 </h5>
								  <div class="grow">
									<p>Registered</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<a href="all-news.php" style="text-decoration: none; color: inherit;">
							<div class="r3_counter_box">
								<i class="fa fa-comment"></i>
								<div class="stats">
				<?php
				$result = $db->prepare("SELECT count(*) as total FROM news");
				$result->execute();
				$row = $result->fetch();
                ?>
								  <h5><?php echo $row['total']; ?> </h5>
								  <div class="grow grow1">
									<p>Total News</p>
								  </div>
								</div>
							</div>
							</a>
						</div>
						<div class="col-md-3 widget widget1">
							<a href="all-events.php" style="text-decoration: none; color: inherit;">
							<div class="r3_counter_box">
								<i class="fa fa-eye"></i>
								<div class="stats">
								<?php
				$result = $db->prepare("SELECT count(*) as total FROM events");
				$result->execute();
				$row = $result->fetch();
               ?>
								  <h5><?php echo $row['total']; ?></h5>
								  <div class="grow grow3">
									<p>Total Events</p>
								  </div>
								</div>
							</div>
							</a>
						 </div>
						 <div class="col-md-3 widget">
						 	<a href="adminlist.php" style="text-decoration: none; color: inherit;">
							<div class="r3_counter_box">
								<i class="fa fa-inbox"></i>
								<div class="stats">
								<?php
				$result = $db->prepare("SELECT count(*) as total FROM table_admin");
				$result->execute();
				$row = $result->fetch();
               ?>
								  <h5><?php echo $row['total']; ?> </h5>
								  <div class="grow grow2">
									<p>Total Admins</p>
								  </div>
								</div>
							</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>

			<!-- switches -->
		<!-- //switches -->
		
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
        <?php include "footer.php"; ?>