
<hr>
	
							<div class="form-group uploadPrent">
								<div class="col-sm-7">
									<label for="">Site Favicon</label>
									<div class="input-group">
										<!-- <input type="file" id="files-input-upload" name="userfile" class="form-control" style="display: none"> -->
										<input type="text" name="logo" placeholder="File not selected" class="form-control" value="<?php echo getOption('logo', asset('img/logo.png') ); ?>" readonly="true">
										<span class="input-group-btn">
											<button type="button" class="btn btn-primary jQFileUpload" role="logo">
												<span class="fa fa-upload"></span>
											</button>
										</span>
									</div>
								</div>
								<div class="col-sm-5">
									<!--description goes here -->
									<p>Upload your site Favicon</p>
									<div class="imgPreview">
										<img src="<?php echo getOption('logo', asset('img/logo.png') ); ?>" class="img-responsive">
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
	
							<div class="form-group uploadPrent">
								<div class="col-sm-7">
									<label for="">Site Favicon</label>
									<div class="input-group">
										<input type="file" name="favicon" value="{{ getOption('logo', asset('img/favicon.ico') ) }}" class="form-control" placeholder="File not selected" readonly="true">
										<span class="input-group-btn">
											<button type="button" class="btn btn-primary jQFileUpload" role="favicon">
												<span class="fa fa-upload"></span>
											</button>
										</span>
									</div>
								</div>
								<div class="col-sm-5">
									<!--description goes here -->
									<p>Upload your site Favicon</p>
									<div class="imgPreview">
										<img src="<?php echo getOption('favicon', asset('img/favicon.ico') ); ?>" class="img-responsive">
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
	<div class="form-group">
		<input type="hidden" name="tab" value="header">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
