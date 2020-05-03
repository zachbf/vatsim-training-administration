					<h3 class="page-title">Edit Competency </h3>
									
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-body">
									<?php echo form_open('administration/editcompetency/' . $compInfo['id']);?>		
									
									<div class="form-group">
										<label for="code">Unit Code</label>
										<input type="text" class="form-control" name="code" id="code" placeholder="TWR1" value="<?php echo $compInfo['code'];?>" required>
									</div>
									
									<div class="form-group">
										<label for="name">Element</label>
										<textarea type="text" class="form-control" name="name" id="name" placeholder="Setup and Configure..." rows="3" required><?php echo $compInfo['name'];?></textarea>
									</div>
									
									<div class="form-group">
										<label for="criteria">Criteria</label>
										<textarea type="text" class="form-control" name="criteria" id="criteria" placeholder="Uses a correct callsign..." rows="6" required><?php echo $compInfo['criteria'];?></textarea>
									</div>
									<a role="button" href="<?php echo base_url();?>/administration/competencies" class="btn btn-default" style="width:49%;">Cancel</a>											&nbsp;<button type="submit" class="btn btn-info" style="width:50%;">Edit</button>
							  	</form>
					    	</div>
					  	</div>
					</div>