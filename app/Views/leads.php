<?php require 'header.php'; ?>

<div class="container mt-5">
	<h1 class="mb-4">Lead statuses</h1>

	<form method="GET" action="/leads" class="mb-4">
		<div class="form-row d-flex gap-3">
			<div class="form-group col-md-3">
				<label for="startDate">Date from</label>
				<input type="date"
					   class="form-control"
					   id="startDate"
					   name="start_date"
					   value="<?php echo htmlspecialchars($_GET['start_date'] ?? ''); ?>"
					   max="<?php echo date('Y-m-d'); ?>"
				>
			</div>
			<div class="form-group col-md-3">
				<label for="endDate">Date to</label>
				<input type="date"
					   class="form-control"
					   id="endDate"
					   name="end_date"
					   value="<?php echo htmlspecialchars($_GET['end_date'] ?? ''); ?>"
					   max="<?php echo date('Y-m-d'); ?>"
				>
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
<script>
	document.addEventListener('DOMContentLoaded', function () {
		const startDateInput = document.getElementById('startDate');
		const endDateInput = document.getElementById('endDate');

		function validateDates() {
			const startDate = new Date(startDateInput.value);
			const endDate = new Date(endDateInput.value);

			if (startDate && endDate && startDate > endDate) {
				endDateInput.setCustomValidity('End date must be later than start date.');
			} else {
				endDateInput.setCustomValidity('');
			}
		}

		startDateInput.addEventListener('change', validateDates);
		endDateInput.addEventListener('change', validateDates);
	});
</script>
<?php require 'footer.php'; ?>
