<?php include "header.php"; ?>
<!-- //header-ends -->
<div id="page-wrapper">
    <div class="graphs">
        <h3 class="blank1">All Projects</h3>
        <div class="xs tabls">
            <div class="panel-body1">
                <?php if (get("success")) : ?>
                    <div>
                        <?= App::message("success", "Successfully deleted a Project!") ?>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!isset($_GET["page"])) {
                            $_GET["page"] = 1;
                        }

                        $tbl_name = "projects"; // your table name
                        $adjacents = 3;

                        $get_projects_tbl = ORM::for_table("$tbl_name")
                            ->find_array();

                        $total_pages = count($get_projects_tbl);

                        $limit = 10; // how many items to show per page
                        $page = $_GET['page'];
                        if ($page)
                            $start = ($page - 1) * $limit;
                        else
                            $start = 0;

                        $result = $db->prepare("SELECT * FROM projects ORDER BY id DESC LIMIT $start, $limit");
                        $result->execute();

                        $prev = $page - 1;
                        $next = $page + 1;
                        $lastpage = ceil($total_pages / $limit);
                        $lpm1 = $lastpage - 1;
                        ?>

                        <span class="text-muted m-r-sm">Showing
                            <?php if ($lastpage == $next - 1) : ?>
                                <?= $total_pages ?>
                            <?php else : ?>
                                <?= $page * $limit ?>
                            <?php endif; ?>
                            of <?= $total_pages ?>
                        </span>

                        <div class="btn-group">
                            <?php if ($page != 1) : ?>
                                <a class="btn btn-default" href="?page=<?= $prev ?>"><i class="fa fa-angle-left"></i></a>
                            <?php endif; ?>

                            <?php if ($lastpage == $next - 1) : ?>

                            <?php else : ?>
                                <a class="btn btn-default" href="?page=<?= $next ?>"><i class="fa fa-angle-right"></i></a>
                            <?php endif; ?>
                        </div>

                        <?php
                        for ($i = 1; $row = $result->fetch(); $i++) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo isset($row['project_title']) ? $row['project_title'] : 'N/A'; ?></td>
                                
                                <td>
                                    <a href="../project_post.php?id=<?= $row['id'] ?>" target="_blank" class="fa fa-eye-slash btn btn-xs btn-primary">View</a>
                                    <a href="deleteproject.php?id=<?= $row['id'] ?>" class="fa fa-eraser btn btn-xs btn-success warning_4 delbtn">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
