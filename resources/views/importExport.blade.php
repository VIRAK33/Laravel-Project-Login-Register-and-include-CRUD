<html lang="en">
<head>
	<title>Politeknik Negeri Semarang</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>

<body>
<br/>
<br/>
	<div class="container">		
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title" style="padding:10px 0px;font-size:20px;"><strong>Import Data Officer</strong></h3>
		  </div>
		  <div class="panel-body">


		  		<!-- Menampilkan Alert Berhasil Mengimport Excel Ke Database -->
		  		@if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
				@endif

				<!-- Menu Untuk Import Excel Ke Database -->
				<h3>Import File Form:</h3>
				<form style="border: 3px solid #a1a1a1;margin-top: 10px;padding: 15px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

					<input type="file" name="import_file" />
					{{ csrf_field() }}
					<br/>

					<!-- Menu Untuk Upload Excel -->
					<button class="btn btn-primary">Upload File</button>
				</form>

		  		<!-- Menu Untuk Export Database Ke Excel -->
		    	<h3>Import File From Database:</h3>
		    	<div style="border: 3px solid #a1a1a1;margin-top: 15px;padding: 20px;"> 		
			    	<a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
					<a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
					<a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Download Excel CSV</button></a>
					
				</div>
		    	<br>
		    	<a href="{{ url('/crud') }}" class="btn btn-warning">Come Back</a>
		  </div>
		</div>
	</div>

</body>

	<!-- Membuat Link Ke Polines.ac.id & Copyright Web -->
	<center><footer id="footer">
        <a href="https://www.polines.ac.id/id/" target="_blank">Polytechnic of Semarang</a> &copy; <?php echo date('Y');?> All Rights Reserved.
    </footer></center>
    <script src="/js/app.js"></script>
</html>