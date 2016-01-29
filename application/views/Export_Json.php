<?php $this->load->view('partials/Header'); ?>

<?php $this->load->view('partials/MenuBar'); ?>
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-orange">
					<div class="panel-heading">
						<h4>หน้าแสดงข้อมูล JSON</h4>
					</div>
					<form name="customer_form" class="form-horizontal">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
						            <div class="form-group">
						                <label class="col-sm-3 control-label">เลือกประเภทข้อมูล :</label>
						                <div class="col-sm-6">
						                  	<select name="slTypeJson" id="slTypeJson" ng-model="slTypeJson.id"  class="form-control" ng-change="showDataJSON()">
						                  		<option value="">---Please select---</option>
									      		<option value="1">user object</option>
									      		<option value="2">address object</option>
									      		<option value="3">book object</option>
									    	</select>
						                </div>
						            </div>
						        </div>
						    </div>
						    <div class="row">
								<div class="col-md-12">
						            <div class="form-group">
						                <div id="display" />
						            </div>
						        </div>
						    </div>
						</div>
			      	</form>
				</div>
			</div>
		</div>
	</div> <!-- container -->

<?php $this->load->view('partials/Footer'); ?>