<!-- Add Donors Modal -->
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title text-white" id="myLargeModalLabel">New Donor Info</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form id="submit-form">
					<div class="form-group">
						<label>Fullname <span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="fullname" id="fullname" required>
					</div>
					<div class="form-group">
						<label>Contact No <span class="text-danger">*</span></label>
						<input class="form-control" name="contactNo" type="text" id="contactNo" required>
					</div>
					<div class="form-group">
						<label>Blood Group <span class="text-danger">*</span></label>
						<select class="form-control" name="bloodGroup" id="bloodGroup" required>
							<option value="A+">A+</option>
							<option value="B+">B+</option>
							<option value="O+">O+</option>
							<option value="AB+">AB+</option>
							<option value="A-">A-</option>
							<option value="B-">B-</option>
							<option value="O-">O-</option>
							<option value="AB-">AB-</option>
						</select>
					</div>
					<div class="form-group">
						<label>Address <span class="text-danger">*</span></label>
						<textarea class="form-control" name="address" id="address"></textarea>
					</div>
					<div>
						<button class="btn btn-success btn-block">Submit</button>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>