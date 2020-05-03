					<h3 class="page-title">Edit Unit: </h3>
										
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-body">
									<?php echo form_open('administration/unitadd');?>		
									<div class="form-group">
										<label for="studentid">Unit Name</label>
										<input type="text" class="form-control" name="name" placeholder="Example: Tower Mentoring Lesson 1" required>
									</div>
									
									<div class="form-group">
										<label for="studentid">Unit Code</label>
										<input type="text" class="form-control" name="code" placeholder="Example: TWRMEN001" required>
									</div>
									
									<div class="form-group">
										<label for="studentid">Type</label>
										
										<select name="type" class="form-control" required>
											<option value="1">Mentoring</option>
											<option value="2">Assessment/Check</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="studentid">Rating</label>
										
										<select name="rating" class="form-control" required>
											<option value="S2">Tower Controller (S2)</option>
											<option value="S3">TMA Controller (S3)</option>
											<option value="C1">Enroute Controller (C1)</option>
											<option value="C3">Senior Controller (C3)</option>
											<option value="VC">Visiting Controller (VC)</option>
											<option value="PT">Procedural Tower (PT)</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="finish">Enabled?</label><br />
										<div class="radio-inline">
											<input type="radio" name="active" value="1">
											Yes
										</div>
										<div class="radio-inline">
											<input type="radio" name="active" value="0" checked>
											No
										</div>
									</div>
					      		</div>
							  	<div class="modal-footer">
						        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-success">Create</button>
						      	</div>
							  	</form>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
					</div>