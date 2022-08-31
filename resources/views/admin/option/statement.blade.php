<form action='/dashboard/option/store' method="POST">
	@csrf
    <div class="form-group">
        <label for="statement_header">Top Banner</label>
        <textarea  name="statement_header" rows="8" class="form-control" id="statement_header" placeholder="Company Pad Top Header">{{ getOption('statement_header') }}</textarea>
        <small>Paste an image url or base64 string <a href="https://www.base64-image.de/" target="_blank">Click here</a>  to generate string (Size: 2480px / 320px)</small>
    </div>

    <div class="form-group">
        <label for="statement_footer">Bottom Banner</label>
        <textarea  name="statement_footer" rows="8" class="form-control" id="statement_footer" placeholder="Company Pad Bottom">{{ getOption('statement_footer') }}</textarea>
        <small>Paste an image url or base64 string <a href="https://www.base64-image.de/" target="_blank">Click here</a>  to generate string (Size: 2480px / 280px)</small>
    </div>

	<div class="form-group">
        <input type="hidden" name="tab" value="statement">
		<input type="submit" value="Save Changes" name="submit" class="btn btn-primary save-general-settings">
	</div>
</form>
