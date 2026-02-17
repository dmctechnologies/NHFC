<?php include "header.php"; ?>
<div id="page-wrapper">
    <div class="graphs">
        <h3 class="blank1">All Projects</h3>
        <div class="xs tabls">
            <div class="panel-body1">
                <?php if (get("success")) : ?>
                    <div>
                        <?= App::message("success", "Successfully deleted a project!") ?>
                    </div>
                <?php endif; ?>

                <?php
                $page = max(1, (int)($_GET["page"] ?? 1));
                $tbl_name = "projects";
                $limit = 10;
                $start = ($page - 1) * $limit;

                $get_projects_tbl = ORM::for_table($tbl_name)->find_array();
                $total_pages = count($get_projects_tbl);
                $lastpage = max(1, (int)ceil($total_pages / $limit));
                $prev = max(1, $page - 1);
                $next = min($lastpage, $page + 1);

                $result = $db->prepare("SELECT * FROM projects ORDER BY id DESC LIMIT $start, $limit");
                $result->execute();

                $shown_count = min($page * $limit, $total_pages);
                ?>

                <div class="list-toolbar">
                    <span class="text-muted m-r-sm">Showing <?= $shown_count ?> of <?= $total_pages ?></span>
                    <div class="btn-group">
                        <?php if ($page > 1) : ?>
                            <a class="btn btn-default" href="?page=<?= $prev ?>" aria-label="Previous page">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        <?php endif; ?>
                        <?php if ($page < $lastpage) : ?>
                            <a class="btn btn-default" href="?page=<?= $next ?>" aria-label="Next page">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-actions">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 1; $row = $result->fetch(); $i++): ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= isset($row['project_title']) ? $row['project_title'] : 'N/A'; ?></td>
                                    <td>
                                        <a href="../project_post.php?id=<?= $row['id']; ?>" target="_blank" class="btn btn-xs btn-primary">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a href="deleteproject.php?id=<?= $row['id']; ?>" class="btn btn-xs btn-success warning_4 delbtn">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "footer.php"; ?>
