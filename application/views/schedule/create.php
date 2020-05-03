					<h3 class="page-title">New Schedule</h3>
					
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-body">
									<?php echo form_open('schedule/add');?>
									
									<div class="form-group">
										<label for="studentid">Student</label>
										<input type="text" class="form-control" id="studentid" placeholder="VATSIM ID">
									</div>
									
									<div class="form-group">
										<label for="unit">Unit</label>
										<select class="form-control" id="unit">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="start">Start</label>
										<input type="text" class="form-control" id="start" placeholder="Start date and time">
									</div>
									
									<div class="form-group">
										<label for="finish">Start</label>
										<input type="text" class="form-control" id="finish" placeholder="End date and time">
									</div>
									
									<div class="form-group">
										<label for="finish">Location</label>
										<input type="text" class="form-control" id="start" placeholder="ICAO">
									</div>
									
									<div class="form-group">
										<div class="radio-inline">
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
											Sweatbox
										</div>
										<div class="radio-inline">
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
											Online
										</div>
									</div>
									
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
					</div>