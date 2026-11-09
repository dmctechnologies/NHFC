<?php include "header.php"; ?>
	<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					
					<div class="xs">
						
						<div class="col-md-8 inbox_right">
							<div class="Compose-Message">               
								<div class="panel panel-default">
									<div class="panel-heading">
									Edit Site Settings
									</div>
									<?php if(get("success")):?>
                                            <div>
                                               <?=App::message("success", "Successfully edited site settings!")?>
                                            </div>
                                            <?php endif;?>
									<?php if(get("failed")):?>
                                            <div>
                                               <?=App::message("error", "Failed to save settings", get("error"))?>
                                            </div>
                                            <?php endif;?>
									<div class="panel-body panel-body-com-m">
										 <?php
                            //include('../connect.php');
				$result = $db->prepare("SELECT * FROM settings");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
               ?> 
                <form class="com-mail"  action="save-setting.php" method="post" enctype="multipart/form-data">
											
												<label>Site Name : </label>
												<input type="text" name="site_name" value="<?php echo $row['site_name']; ?>" class="form-control1 control3">
												<label>Site Title : </label>
												<input type="text" name="site_title" value="<?php echo $row['site_title']; ?>" class="form-control1 control3">
												<label>Site Email : </label>
												<input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control1 control3">
												<label>Site Description </label>
												<input type="text" name="site_desc" value="<?php echo $row['site_desc']; ?>" class="form-control1 control3">
												<label>Site Keywords </label>
												<input type="text" name="site_keyword" value="<?php echo $row['site_keyword']; ?>" class="form-control1 control3">
												<label>Google Analytic Code </label>
												<input type="text" name="google_code" value="<?php echo $row['google_code']; ?>" class="form-control1 control3">
												<label>Street Name</label>
												<input type="text" name="street" value="<?php echo $row['street']; ?>" class="form-control1 control3">
												<label>City </label>
												<input type="text" name="city" value="<?php echo $row['city']; ?>"class="form-control1 control3">
												<label>Country </label>
												<input type="text" name="country" value="<?php echo $row['country']; ?>" class="form-control1 control3">
												<label>Phone 1</label>
												<input type="text" name="phone" value="<?php echo $row['phone']; ?>"class="form-control1 control3">
												<label>Phone 2</label>
												<input type="text" name="linkedin" value="<?php echo $row['linkedin']; ?>" class="form-control1 control3">
												<label>Facebook Page ID</label>
												<input type="text" name="facebook" value="<?php echo $row['facebook']; ?>" class="form-control1 control3">
												<label>Twitter Account </label>
												<input type="text" name="twitter" value="<?php echo $row['twitter']; ?>" class="form-control1 control3">
												<label>Instagram </label>
												<input type="text" name="status" value="<?php echo $row['status']; ?>" class="form-control1 control3">
												<hr>
												<h4>Homepage Popup Ad</h4>
												<label>Enable Popup Ad</label>
												<input type="checkbox" name="home_ad_enabled" value="1" <?php echo ((int) ($row['home_ad_enabled'] ?? 0) === 1) ? 'checked' : ''; ?>>
												<label>Ad Title</label>
												<input type="text" name="home_ad_title" value="<?php echo htmlspecialchars($row['home_ad_title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control1 control3">
												<label>Ad Message</label>
												<textarea name="home_ad_body" class="form-control1 control3" rows="4"><?php echo htmlspecialchars($row['home_ad_body'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
												<label>Button Text</label>
												<input type="text" name="home_ad_button_text" value="<?php echo htmlspecialchars($row['home_ad_button_text'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control1 control3">
												<label>Button URL</label>
												<input type="text" name="home_ad_button_url" value="<?php echo htmlspecialchars($row['home_ad_button_url'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control1 control3" placeholder="https://example.com/events">
												<label>Image URL (optional)</label>
												<input type="text" name="home_ad_image" value="<?php echo htmlspecialchars($row['home_ad_image'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control1 control3" placeholder="images/slide2.jpg">
												<label>Upload Image (optional)</label>
												<input type="file" name="home_ad_image_file" class="form-control1 control3" accept="image/*">
												<?php if (!empty($row['home_ad_image'])): ?>
												<div style="margin: 10px 0;">
													<img src="<?php echo htmlspecialchars($row['home_ad_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Current ad image" style="max-width: 220px; height: auto; border: 1px solid #ddd; padding: 4px;">
												</div>
												<label>
													<input type="checkbox" name="home_ad_image_remove" value="1">
													Remove current image
												</label>
												<?php endif; ?>
												
												
			      		<hr>
											<input type="submit" value="Save Settings">
										</form><?php
}
?>
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
