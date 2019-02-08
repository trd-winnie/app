<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">Login</div>
		<div class="card-body">

			<?php if (validation_errors()): ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php flash_messages() ?>

			<?= form_open('login/submit') ?>
				<div class="form-group">
					<div class="form-label-group">
						<input type="email" id="email" name="email" value="<?= set_value('email')?>" class="form-control" placeholder="Email address" autofocus="autofocus">
						<label for="email">Email address</label>
					</div>
				</div>
				<div class="form-group">
					<div class="form-label-group">
						<input type="password" id="password" name="password" class="form-control" placeholder="Password">
						<label for="password" >Password</label>
					</div>
				</div>
				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" value="remember-me">
							Remember Password
						</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Login</button>
			</form>
			<div class="text-center">
				<a class="d-block small mt-3" href="register.html">Register an Account</a>
				<a class="d-block small" href="forgot-password.html">Forgot Password?</a>
			</div>
		</div>
	</div>
</div>

