<?php include "header.php"; ?>
    <!-- //header-ends -->
            <div id="page-wrapper"></div>
                <div class="graphs"></div>
                    <h3 class="blank1">Add Project</h3>
                    <div class="xs">
                        
                        <div class="col-md-8 inbox_right"></div>
                            <div class="Compose-Message">               
                                <div class="panel panel-default"></div>
                                    <div class="panel-heading">
                                        Add New Project
                                    </div>
                                     <?php if(get("success")):?>
                                            <div>
                                               <?=App::message("success", "Project added successfully!")?>
                                            </div>
                                            <?php endif;?>
                                    <div class="panel-body panel-body-com-m">
                                        
                                        <form class="com-mail" action="saveproject.php" method="post" enctype="multipart/form-data">
                                                <label>Project Name : </label>
                                                <input type="text" name="project_name" class="form-control1 control3" placeholder="Project Name" required>
                                                
                                                <label>Project Description : </label>
                                                <textarea rows="6" id="body" name="project_description" class="form-control1 control2" required></textarea>
                                                 <script>
                CKEDITOR.replace( 'body' );
            </script>
            
                                                
                                                
                                                <label>Upload Project File</label>
                                                <input type="file" name="file" class="form-control1 control3">
                        
                                            <hr>
                                            <input type="submit" value="Add Project">
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