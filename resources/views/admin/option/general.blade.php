<form action='/dashboard/option/store' method="POST">
	@csrf
    <div class="form-group">
        <label for="">Company Name</label>
        <input type="text" name="company_name" value="{{ getOption('company_name') }}" class="form-control" id="company_name" placeholder="Company Name">
    </div>
    <div class="form-group">
        <label for="company_logo">Company Logo</label>
        <textarea  name="company_logo" class="form-control" id="company_logo" placeholder="Company Name">{{ getOption('company_logo') }}</textarea>
        <small>Paste an image url or base64 string <a href="https://www.base64-image.de/" target="_blank">Click here</a>  to generate string (Size: 200px / 70px)</small>
    </div>
	<div class="form-group">
		<label for="">Address</label>
		<input type="text" name="company_address" value="{{ getOption('company_address') }}" class="form-control" id="company_address" placeholder="Address / Location">
	</div>
	<div class="form-group">
		<label for="">Primary Email</label>
		<input type="text" name="contact_email" value="{{ getOption('contact_email') }}" class="form-control" id="contact_email" placeholder="Contact Email">
	</div>
	<div class="form-group">
		<label for="">Second Email</label>
		<input type="text" name="contact_email_alternate" value="{{ getOption('contact_email_alternate') }}" class="form-control" id="contact_email_alternate" placeholder="Contact Email">
	</div>
	<div class="form-group">
		<label for="">Primary Number</label>
		<input type="text" name="contact_number" value="{{ getOption('contact_number') }}" class="form-control" id="contact_number" placeholder="Contact Email">
	</div>

	<div class="form-group">
        <input type="hidden" name="tab" value="general">
		<input type="submit" value="Save Changes" name="submit" class="btn btn-primary save-general-settings">
	</div>
</form>
