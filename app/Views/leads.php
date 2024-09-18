<?php require 'header.php'; ?>

<div class="container mt-5">
	<h1 class="mb-4">Lead statuses</h1>

	<form method="GET" action="/leads" class="mb-4">
		<div class="form-row d-flex gap-3">
			<div class="form-group col-md-3">
				<label for="startDate">Date from</label>
				<input type="date" class="form-control" id="startDate" name="start_date" value="<?php echo htmlspecialchars($_GET['start_date'] ?? ''); ?>">
			</div>
			<div class="form-group col-md-3">
				<label for="endDate">Date to</label>
				<input type="date" class="form-control" id="endDate" name="end_date" value="<?php echo htmlspecialchars($_GET['end_date'] ?? ''); ?>">
			</div>
			<div class="form-group col-md-3 d-flex align-items-end">
				<button type="submit" class="btn btn-primary">Filter</button>
			</div>
		</div>
	</form>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Status</th>
				<th>FTD</th>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($leads['data'])): ?>
				<?php foreach ($leads['data'] as $lead): ?>
					<tr>
						<td><?= htmlspecialchars($lead['id']) ?></td>
						<td><?= htmlspecialchars($lead['email']) ?></td>
						<td><?= htmlspecialchars($lead['status']) ?></td>
						<td><?= htmlspecialchars($lead['ftd']) ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="4" class="text-center">No data</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<?php require 'footer.php'; ?>
