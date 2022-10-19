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
			<div class="col-md-2 border bg-light">
				<h5 class="fst-italic">Custome model</h5><hr/>
				<ul class="navbar-nav">
				<li><a href="" class="navbar-brand" id="getRow">Get Rows</a></li>
				<li><a href="" class="navbar-brand" id="getR_sort">Get Rows Sorted</a></li>
				<li><a href="" class="navbar-brand" id="getR_inlike">Get Rows Where In Like</a></li>
				<li><a href="" class="navbar-brand" id="join">Get Rows Where Join</a></li>
				<li><a href="" class="navbar-brand" id="dis-row">Get Distinct Rows</a></li>
				<li><a href="" class="navbar-brand" id="s-rows">Get Single Row</a></li>
				<li><a href="" class="navbar-brand" id="total_cnt">Get Total Count</a></li>
				<li><a href="" class="navbar-brand" id="get_cnt">Get Count</a></li>
				<li><a href="" class="navbar-brand" id="insert">Insert Row</a></li>
				<li><a href="" class="navbar-brand" id="update">Update Row</a></li>
				<li><a href="" class="navbar-brand " id="delete">Delete Row</a></li>
				<li><a href="" class="navbar-brand" id="gets-value">Get Single Value</a></li>
				<li><a href="" class="navbar-brand" id="customQ">customQuery</a></li>
				<li><a href="" class="navbar-brand" id="getResult">getResult</a></li>
				<li><a href="" class="navbar-brand">Check Availability</a></li>
				<li><a href="" class="navbar-brand">Find In Set</a></li>
				</ul>
			</div>
			<div class="col-md-10 border bg-light">
				<div id="display_qry" class="h6 text-danger"></div>
				<div id="display_array" class="h6 text-danger"></div>
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
	<script>
		$(document).ready(function(){
			$('#getRow').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/getrows') ?>',
						type: 'post',
						dataType :'json'
					}).done(function(res){
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#getR_sort').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/get_rows_sort') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#getR_inlike').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/get_rows_inlike') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#join').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/join') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#dis-row').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/Get_Distinct_R') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							console.log(res.data);
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#s-rows').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/single_row') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$('#tbody').append("<tr><td>"+res.data['id']+"</td><td>"+res.data['name']+"</td><td>"+res.data['email']+"</td><td>"+res.data['city']+"</td></tr>");
					});
			});
			$('#total_cnt').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/get_total_count') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#display_qry').html(res.qry);
						$('#display_array').html(res.data);
					});
			});
			$('#get_cnt').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/get_count') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#display_qry').html(res.qry);
						$('#display_array').html(res.data);
					});
			});
		});
	</script>
</body>
</html>
