<?php require 'header.php' ?>

<div class="container mt-5">
	<h1 class="mb-4">Create Lead</h1>

	<?php if (!empty($errors)): ?>
		<div class="alert alert-danger" role="alert">
			<ul>
				<?php foreach ($errors as $error): ?>
					<li><?php echo $error ?></li>
				<?php endforeach ?>
			</ul>
		</div>
	<?php endif; ?>
	<form action="/submit_lead" method="POST" class="d-flex flex-column col-6">
		<div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text"
				   class="form-control"
				   id="firstName"
				   name="firstName"
				   value="<?php echo htmlspecialchars($formData['firstName'] ?? ''); ?>"
				   required
			>
		</div>
		<div class="form-group">
			<label for="lastName">Surname</label>
			<input type="text"
				   class="form-control"
				   id="lastName"
				   name="lastName"
				   value="<?php echo htmlspecialchars($formData['lastName'] ?? ''); ?>"
				   required
			>
		</div>
		<div class="form-group">
			<label for="phone">Phone</label>
			<input type="text"
				   class="form-control"
				   id="phone"
				   name="phone"
				   value="<?php echo htmlspecialchars($formData['phone'] ?? ''); ?>"
				   required
			>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email"
				   class="form-control"
				   id="email" name="email"
				   value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>"
				   required
			>
		</div>
		<button type="submit" class="btn btn-success mt-4">Submit</button>
	</form>
</div>

<?php require 'footer.php' ?>

