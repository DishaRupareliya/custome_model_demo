<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
		echo $css;
		echo $js;
	?>
	<title></title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="alert alert-dark text-center" role="alert">
	  				<h2 class=" fst-italic"><li class='list-group-item'>Custome Model</li></h2>
				</div>
			</div>
			<div class="col-md-9">
				<div class="alert alert-dark text-center" role="alert">
					<div class="btn-toolbar mb-3">
						  <div class="btn-group me-2 col-md-2" role="group" aria-label="First group">
						    <button type="button" class="btn btn-success">Search</button>
						  </div>
						  <div class=" col-md-9">
						    <input type="text" class="form-control" placeholder="Input group example">
						  </div>
						</div>

	  				<!-- <li class='list-group-item col-7'>
	  					
						<input type="number" name="text_num" id="text_num" class="form-control">
						<button>Search</button>
					</li> -->
				</div>
			</div>
		</div>
		<div class="row pt-2">
			<div class="col-md-3">
				<div class="card">
				<h5 class="card-header fst-italic"><a href="" class="nav-link text-dark" id="c_model">Model Methods</a></h5>
				<ul class="list-group list-group-flush">
					<?php foreach ($list_item as $key => $value): ?>
						<li class='list-group-item'><a href="" class="nav-link text-dark" id="<?= $key ?>"><?= $value ?></a></li>
					<?php endforeach ?>
				  </ul>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card mb-3" id="section1">
					<h4 class="card-header fst-italic" id = "heading">Custom model</h4>
					<div class="card-body p-2">
						<div id="display_qry" class="h5 text-danger"></div>
						<div id="display_array" class="h5 text-danger"></div>
					</div>
				</div>
				<div class="card" id="section2">
					<h4 class="card-header fst-italic" id = "heading">Table Data</h4>
					<div class="card-body p-4">
						<table class="table">
							<thead id="thead">
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>City</th>
								</tr>
							</thead>
							<tbody id="tbody"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div> 
	</div>

	<script>
		$(document).ready(function(){
			$('#section1').hide();
			$('#section2').hide();
			$('#c_model').on('click', function () {
				location.reload();
			});
			$('#getRow').on('click', function (e) {
				$('#section1').show();
				$('#section2').show();
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/getrows') ?>',
						type: 'post',
						dataType :'json'
					}).done(function(res){
						$('#heading').html('Get Rows');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#getR_sort').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/get_rows_sort') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Rows Sort');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#getR_inlike').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/get_rows_inlike') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Rows In like');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#join').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/join') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Join');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#dis-row').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/Get_Distinct_R') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Distinct/Unique Row');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#s-rows').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/single_row') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Single Row');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$('#tbody').append("<tr><td>"+res.data['id']+"</td><td>"+res.data['name']+"</td><td>"+res.data['email']+"</td><td>"+res.data['city']+"</td></tr>");
					});
			});
			$('#total_cnt').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').hide();
				$.ajax({
						url: '<?= site_url('custom_controller/get_total_count') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Total Count');
						$('#display_qry').html(res.qry);
						$('#display_array').html('Get Total Count '+res.data);
						$('#table').hide();
					});
			});
			$('#get_cnt').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').hide();
				$.ajax({
						url: '<?= site_url('custom_controller/get_count') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Count');
						$('#display_qry').html(res.qry);
						$('#display_array').html('Get Count '+res.data);
					});
			});
			$("#insert").on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/insert_data') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Insert Row');
						$('#display_qry').html(res.qry);
						$('#display_array').html(res.id + ' number id inserted');
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#update').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').hide();
				$.ajax({
						url: '<?= site_url('custom_controller/update_data') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Update Row');
						$('#display_qry').html(res.qry);
						$('#display_array').html(res.data);
					});
			});
			$('#delete').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').hide();
				$.ajax({
						url: '<?= site_url('custom_controller/delete_data') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Delete Row');
						$('#display_qry').html(res.qry);
						$('#display_array').html(res.data +'row deleted');
					});
			});
			$('#gets-value').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/get_singel_value') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Single Value');
						$('#display_qry').html(res.qry);
						$('#display_array').empty();
						$('#tbody').empty();
						$('#tbody').append("<tr><td></td><td></td><td></td><td>"+res.data+"</td>");
					});
			});
			$('#customQ').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/custom_query') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Custom Query');
						$('#display_qry').html(res.qry);
						$('#display_array').empty();
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#getResult').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/get_result') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Result');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
					 	});
					});
			});
			$('#check').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').hide();
				$.ajax({
						url: '<?= site_url('custom_controller/check_availability') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Check Availability');
						$('#display_qry').html(res.qry);
						$('#display_array').html('Check Availability ='+res.data);
					});
			});
			$('#find_in_set').on('click', function (e) {
				e.preventDefault();
				$('#section1').show();
				$('#section2').show();
				$.ajax({
						url: '<?= site_url('custom_controller/find_in_set') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Find Set');
						$('#display_qry').html(res.qry);
						$('#display_array').empty();
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
		});
	</script>
</body>
</html>
