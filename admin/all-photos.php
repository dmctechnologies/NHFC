<?php include "header.php"; ?>
<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">All Photos</h3>
		<div class="xs tabls">
			<div class="panel-body1">
				<?php if (get("success")): ?>
					<div>
						<?= App::message("success", "Successfully deleted a photo!") ?>
					</div>
				<?php endif; ?>

				<?php
				$page = max(1, (int)($_GET["page"] ?? 1));
				$tbl_name = "gallery";
				$limit = 10;
				$start = ($page - 1) * $limit;

				$get_gallery = ORM::for_table($tbl_name)->find_array();
				$total_pages = count($get_gallery);
				$lastpage = max(1, (int)ceil($total_pages / $limit));
				$prev = max(1, $page - 1);
				$next = min($lastpage, $page + 1);

				$result = $db->prepare("SELECT * FROM gallery ORDER BY id DESC LIMIT $start, $limit");
				$result->execute();

				$shown_count = min($page * $limit, $total_pages);
				?>

				<div class="list-toolbar">
					<span class="text-muted m-r-sm">Showing <?= $shown_count ?> of <?= $total_pages ?></span>
					<div class="btn-group">
						<?php if ($page > 1): ?>
							<a class="btn btn-default" href="?page=<?= $prev ?>" aria-label="Previous page">
								<i class="fa fa-angle-left"></i>
							</a>
						<?php endif; ?>
						<?php if ($page < $lastpage): ?>
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
								<th>Caption</th>
								<th>Photo</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i = 1; $row = $result->fetch(); $i++): ?>
								<tr>
									<th scope="row"><?= $i; ?></th>
									<td><?= $row['caption']; ?></td>
									<td>
										<img
											src="../uploads/<?= $row['file']; ?>"
											alt="<?= htmlspecialchars($row['caption'] ?: 'Gallery image', ENT_QUOTES, 'UTF-8'); ?>"
											class="img-responsive"
											style="height: 50px; width: 50px; object-fit: cover; border-radius: 6px;"
										>
									</td>
									<td>
										<a href="delete-photo.php?id=<?= $row['id']; ?>" class="btn btn-xs btn-success warning_4 delbtn">
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
