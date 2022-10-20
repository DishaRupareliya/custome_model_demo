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
				<li><a href="" class="navbar-brand" id="check">Check Availability</a></li>
				<li><a href="" class="navbar-brand" id="find_in_set">Find In Set</a></li>
				</ul>
			</div>
			<div class="col-md-10 border bg-light">
				<h3 id = "heading"></h3>
				<div id="display_qry" class="h6 text-danger"></div>
				<div id="display_array" class="h6 text-danger"></div>
				<table class="table" id="table">
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
						$('#heading').html('getrows<hr/>');
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
						$('#heading').html('get_rows_sort<hr/>');
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
						$('#heading').html('Get Rows In like<hr/>');
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
						$('#heading').html('Join<hr/>');
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
						$('#heading').html('Get_Distinct/Unique_Row<hr/>');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
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
						$('#heading').html('Single Row<hr/>');
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
						$('#heading').html('Get Total Count<hr/>');
						$('#display_qry').html(res.qry+'<hr/>');
						$('#display_array').html('Get Total Count '+res.data);
						$('#table').hide();
					});
			});
			$('#get_cnt').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/get_count') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get_Count<hr/>');
						$('#display_qry').html(res.qry+'<hr/>');
						$('#display_array').html('Get Count '+res.data);
						$('#table').hide();
					});
			});
			$("#insert").on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/insert_data') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#table').show();
						$('#heading').html('Insert Row<hr/>');
						$('#display_qry').html(res.qry+'<hr/>');
						$('#display_array').html(res.id + ' number id inserted');
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#update').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/update_data') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Update Row<hr/>');
						$('#display_qry').html(res.qry+'<hr/>');
						$('#display_array').html(res.data);
						$('#table').hide();
					});
			});
			$('#delete').on('click', function (e) {
				$('#table').hide();
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/delete_data') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Delete Row<hr/>');
						$('#display_qry').html(res.qry+'<hr/>');
						$('#display_array').html(res.data +'row deleted');
						$('#table').hide();
					});
			});
			$('#gets-value').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/get_singel_value') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#table').show();
						$('#heading').html('Get Single Value<hr/>');
						$('#display_qry').html(res.qry);
						$('#display_array').empty();
						$('#tbody').empty();
						$('#tbody').append("<tr><td></td><td></td><td></td><td>"+res.data+"</td>");
					});
			});
			$('#customQ').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/custom_query') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Custom Query<hr/>');
						$('#display_qry').html(res.qry+'<hr/>');
						$('#display_array').empty();
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#getResult').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/get_result') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#table').show();
						$('#heading').html('Get Result<hr/>');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
					 	});
					});
			});
			$('#check').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/check_availability') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Check Availability<hr/>');
						$('#display_qry').html(res.qry+'<hr/>');
						$('#display_array').html('Check Availability ='+res.data);
						$('#table').hide();
					});
			});
			$('#find_in_set').on('click', function (e) {
				e.preventDefault();
				$.ajax({
						url: '<?= site_url('custom_controller/find_in_set') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#table').show();
						$('#heading').html('Find Set<hr/>');
						$('#display_qry').html(res.qry);
						$('#display_array').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
		});
	</script>
</body>
</html>
