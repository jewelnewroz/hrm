<form action='/dashboard/option/store' method="POST">
    @csrf
	<div class="form-group">
		<label for="">Company Name</label>
		<input type="text" name="company_name" value="{{ getOption('company_name') }}" class="form-control" id="company_name" placeholder="Company Name">
	</div>
	<div class="form-group">
		<label for="">Address</label>
		<input type="text" name="company_address" value="{{ getOption('company_address') }}" class="form-control" id="company_address" placeholder="Address / Location" style="height:120px;">
	</div>
	<div class="form-group">
		<label for="">Contact Email</label>
		<input type="text" name="contact_email" value="{{ getOption('contact_email') }}" class="form-control" id="contact_email" placeholder="Contact Email">
	</div>
	<div class="form-group">
		<label for="">Second Email</label>
		<input type="text" name="contact_email_alternate" value="{{ getOption('contact_email_alternate') }}" class="form-control" id="contact_email_alternate" placeholder="Contact Email">
	</div>
	<div class="form-group">
		<label for="">Contact Number</label>
		<input type="text" name="contact_number" value="{{ getOption('contact_number') }}" class="form-control" id="contact_number" placeholder="Contact Email">
	</div>

	<div class="form-group">
		<input type="submit" value="Save Changes" name="submit" class="btn btn-primary save-general-settings">
	</div>
</form>
