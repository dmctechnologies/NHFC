<?php include "header.php"; ?>
	<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					
					<div class="xs">
						
						<div class="col-md-8 inbox_right">
							<div class="Compose-Message">               
								<div class="panel panel-default">
									<div class="panel-heading">
									Add New Event
									</div>
									 <?php if(get("success")):?>
                                            <div>
                                               <?=App::message("success", "Event saved Successfully!")?>
                                            </div>
                                            <?php endif;?>
									<?php if(get("failed")):?>
                                            <div>
                                               <?php
												$failed = get("failed");
												$message = "Could not save event. Check required fields and poster upload.";
												if ($failed === "missing_fields") {
													$message = "Please fill in all required fields.";
												} elseif ($failed === "missing_poster") {
													$message = "Please choose an event poster image.";
												} elseif ($failed === "upload_error") {
													$message = "Poster upload failed. Please try again.";
												} elseif ($failed === "invalid_extension" || $failed === "invalid_mime") {
													$message = "Poster must be a valid image (jpg, png, gif, webp).";
												} elseif ($failed === "upload_dir" || $failed === "move_failed") {
													$message = "Server could not save the poster image. Check uploads folder permissions.";
												} elseif ($failed === "db_error") {
													$message = "Database error while saving event. Check the events table columns.";
												}
                                               ?>
                                               <?=App::message("error", $message)?>
                                            </div>
                                            <?php endif;?>
									<div class="panel-body panel-body-com-m">
										
										<form class="com-mail" action="save-event.php" method="post" enctype="multipart/form-data">
											
												<label>Event Title : </label>
												<input type="text" name="title" class="form-control1 control3" required>
												<label>Event Date : </label>
												<input type="text" name="date" class="form-control1 control3" placeholder="3rd, Sept 2017" required>
												<label>Event Time : </label>
												<input type="text" name="time" class="form-control1 control3" placeholder="3PM" required>
												<label>Event Venue : </label>
												<input type="text" name="venue" class="form-control1 control3" required>
												<label>Contact Phone : </label>
												<input type="text" name="phone" class="form-control1 control3">
												<label>Event Poster :</label>
												<input type="file" name="thumbnail" class="form-control1 control3" accept=".jpg,.jpeg,.png,.gif,.webp" required>
			      		<hr>
											<input type="submit" value="Save Event">
										</form>
									</div>
								 </div>
							  </div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<?php include "footer.php"; ?>
