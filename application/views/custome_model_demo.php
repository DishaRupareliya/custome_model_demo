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
		<form  id="myform">
			<div class="row">
				<div class="col-md-3">
					<div class="alert alert-dark text-center" role="alert">
		  				<h2 class=" fst-italic"><li class='list-group-item'>Custome Model</li></h2>
					</div>
				</div>
				<div class="col-md-9">
					<div class="alert alert-dark text-center" role="alert">
						<div class="btn-toolbar mb-3" id="search_div">
						  	<div class="btn-group me-2 col-md-2" role="group" aria-label="First group">
						    	<button type="button" class="btn btn-success" id="btn-search">Search</button>
						  	</div>
						  	<div class=" col-md-9" id="input1">
						    	<input type="number" class="form-control" placeholder="Input any number" id="id">
						  	</div>
						  	<div class=" col-md-9" id="dropdown1">
						    	<select id="select_city" class="form-select" aria-label="Default select example">
									<option></option>
								</select>
						  	</div>
							<!--Customer Modal -->
							<div class="modal fade" id="modalbox" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							 	<div class="modal-dialog">
								    <div class="modal-content">
								    	<div class="modal-header">
								        <h5 class="modal-title" id="staticBackdropLabel">Customer</h5>
								        	<button type="button" class="btn-close" aria-label="Close"></button>
								      	</div>
								      	<div class="modal-body">
								      		<div class="form-floating mb-3">
								      		<input type="hidden" name="hid" id='hid' class="form-control" value="" >
											  <input type="text" class="form-control" id="name" name='name' placeholder="enter name">
											  <label for="name">Name</label>
											</div>
									      	<div class="form-floating mb-3">
											  <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
											  <label for="email">Email</label>
											</div>
											<div class="form-floating">
											  <input type="text" class="form-control" id="city" name="city" placeholder="enter city">
											  <label for="city">City</label>
											</div>
								      	</div>
								      	<div class="modal-footer">
								        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								        	<button type="button" class="btn btn-primary" id="submit">Submit</button>
								      	</div>
								    </div>
							 	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
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
						<div id="msg"></div>
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
			$('#input1').hide();
			$('#dropdown1').hide();
			section_hide();
			$('#c_model').on('click', function () {
				location.reload();
			});
			$('#getRow').on('click', function (e) {
				e.preventDefault();
				$('#input1').hide();
				$('#dropdown1').show();
				section_hide();
				$.ajax({
						url: '<?= site_url('custom_controller/Get_Distinct_R') ?>',
						type: 'post',
						dataType :'json'
					}).done(function(res){
						$('#select_city').empty();
						$('#select_city').append(`<option></option>`);
						$.each(res.data, function(index, val) {
							$('#select_city').append(`<option id="option" value=${val.city}>${val.city}</option>`);
							$('#tbody').empty();
						});
						$('#select_city').on('change', function (e) {
							e.preventDefault();
							$('#display_array').empty();
							section_show();
							var city = $('#select_city').val();
							$.ajax({
							url: '<?= site_url('custom_controller/getrows') ?>',
							type: 'post',
							dataType :'json',
							data : { city : city}
						}).done(function(res){
							$('#heading').html('Get Rows');
							$('#display_qry').html(res.qry);
							$('#tbody').empty();
							$.each(res.data, function(index, val) {
								$('#msg').empty();
								$('.table').show();
								$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
							});
						});
					});
				});
			});
			$('#getR_sort').on('click', function (e) {
				e.preventDefault();
				$('#input1').show();
				$('#dropdown1').hide();
				section_hide();
				$('#btn-search').on('click', function (e) {
					e.preventDefault();
					var id ={ id : $('#id').val()} ;
					$('#display_array').empty();
					section_show();
					user_details('<?= site_url('custom_controller/get_rows_sort')?>', id, 'post', 'Get Rows Sort');
				});
			});
			$('#getR_inlike').on('click', function (e) {
				e.preventDefault();
				$('#input1').show();
				$('#dropdown1').hide();
				$('#display_array').empty();
				section_hide();
				$('#btn-search').on('click', function (e) {
					e.preventDefault();
					var id ={ id : $('#id').val()} ;
					$('#display_array').empty();
					section_show();
					user_details('<?= site_url('custom_controller/get_rows_inlike')?>', id, 'post', 'Get Rows In like');
				});
			});
			$('#join').on('click', function (e) {
				e.preventDefault();
				$('#input1').hide();
				$('#dropdown1').hide();
				$('#display_array').empty();
				section_show();
				$.ajax({
						url: '<?= site_url('custom_controller/join') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Join');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						if(res.data != ''){
							$.each(res.data, function(index, val) {
								$('#msg').empty();
								$('.table').show();
								$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
							});
						}else{
							$('.table').hide();
							$('#msg').html('<h4 class="text-danger">Sorry, records not found</h4>');
						}
					});
			});
			$('#dis-row').on('click', function (e) {
				e.preventDefault();
				$('#display_array').empty();
				section_show();
				$.ajax({
						url: '<?= site_url('custom_controller/Get_Distinct_R') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Distinct/Unique Row');
						$('#display_qry').html(res.qry);
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#msg').empty();
							$('.table').show();
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
					});
			});
			$('#s-rows').on('click', function (e) {
				e.preventDefault();
				$('#display_array').empty();
				section_show();
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
				section2_hide();
				$.ajax({
						url: '<?= site_url('custom_controller/get_total_count') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Total Count');
						$('#display_qry').html(res.qry);
						$('#display_array').html('Total Count '+res.data);
						$('#table').hide();
					});
			});
			$('#get_cnt').on('click', function (e) {
				e.preventDefault();
				section2_hide();
				$.ajax({
						url: '<?= site_url('custom_controller/get_count') ?>',
						type: 'post',
						dataType: 'json'
					}).done(function(res){
						$('#heading').html('Get Count');
						$('#display_qry').html(res.qry);
						$('#display_array').html('Count '+res.data);
					});
			});
			$("#insert").on('click', function (e) {
				e.preventDefault();
				searchbox_hide();
				$('#modalbox').modal('show');
				$('#submit').on('click', function (e) {
					e.preventDefault();
					$('#modalbox').modal('hide');
					section_show();
					var data = {
						name : $('#name').val(),
						email : $('#email').val(),
						city : $('#city').val()
					};
					$.ajax({
						url: '<?= site_url('custom_controller/insert_data') ?>',
						type: 'post',
						dataType: 'json',
						data: data
					}).done(function(res){
						$('#heading').html('Insert Row');
						$('#display_qry').html(res.qry);
						$('#display_array').html(res.id + ' number id inserted');
						$('#tbody').empty();
						$.each(res.data, function(index, val) {
							$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
						});
						
						$('#myform').trigger('reset');
					});
				});
			});
			$('.btn-close').on('click', function (e) {
				$('#myform').trigger('reset');
				$('#modalbox').modal('hide');
				// data-bs-dismiss="modal"
			});
			$('#update').on('click', function (e) {
				e.preventDefault();
				section_hide();
				$('#input1').show();
				$('#dropdown1').hide();
				$('#btn-search').on('click', function (e) {
					e.preventDefault();
					var id = $('#id').val();
					$.ajax({
						url: '<?= site_url('custom_controller/fetch_value') ?>',
						type: 'post',
						data: { id : id},
						dataType: 'json'
					}).done(function(res){
						$('#modalbox').modal('show');
						$.each(res, function(index, val) {
							$('#hid').val(val.id);
							$('#name').val(val.name);
							$('#email').val(val.email);
							$('#city').val(val.city);
						});
						$('#submit').on('click', function (e) {
							e.preventDefault();
							$('#modalbox').modal('hide');
							section_show();
							var id = $('#hid').val();
							var data = {
								name : $('#name').val(),
								email : $('#email').val(),
								city : $('#city').val()
							};
							$.ajax({
									url: '<?= site_url('custom_controller/update_data') ?>',
									type: 'post',
									data: { data, id},
									dataType: 'json'
								}).done(function(res){
									$('#heading').html('Update Row');
									$('#display_qry').html(res.qry);
									$('.table').hide();
									$('#msg').html('<h4 class="text-danger">'+res.id + ' number id '+ res.data+'</h4>'); 
									$('#myform').trigger('reset');
								});
						});
					});
				});
			});
			$('#delete').on('click', function (e) {
				e.preventDefault();
				section2_hide();
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
				section_show();
				$('#msg').empty();
				$('.table').show();
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
				section_show();
				$('#msg').empty();
				$('.table').show();
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
				section_show();
				$('#msg').empty();
				$('.table').show();
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
				section2_hide();
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
				section_show();
				$('#msg').empty();
				$('.table').show();
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
	function section_hide(){
		$('#section1').hide();
		$('#section2').hide();
	}
	function section_show(){
		$('#section1').show();
		$('#section2').show();
	}
	function section2_hide(){
		$('#section1').show();
		$('#section2').hide();
	}
	function searchbox_hide(){
		$('#input1').hide();
		$('#dropdown1').hide();
	}

	function user_details(url, data, type, $method, dataType = 'json'){
		$.ajax({
				url: url,
				type: type,
				data: data,
				dataType: dataType
			}).done(function(res){
				$('#heading').html($method);
				$('#display_qry').html(res.qry);
				$('#tbody').empty();
				if(res.data != ""){
					$.each(res.data, function(index, val) {
						$('#msg').empty();
						$('.table').show();
						$('#tbody').append("<tr><td>"+val.id+"</td><td>"+val.name+"</td><td>"+val.email+"</td><td>"+val.city+"</td></tr>");
					});
				}else{
					$('.table').hide();
					$('#msg').html('<h4 class="text-danger">Sorry, records not found</h4>');
				}
				$('#myform').trigger('reset');
			});
	}
	</script>
</body>
</html>
