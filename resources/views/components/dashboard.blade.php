<div class="container-fluid p-0 text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="panel panel-default">    
        		<div class="panel-heading bg-dark text-white p-3">
        			<h1>Sistem Perekrutan Online PT. Indomarco Prismatama</h1>
        			<h4>Selamat Datang {{ auth()->user()->nama }}</h4>
        		</div>
				@if( Auth::guard('web')->check() )
					
				@endif
				@if( Auth::guard('admin')->check() )

				@endif 


                <div class="panel-body">
                    <div class="jumbotron jumbotron-fluid">
	                    <div class="container">
	                    	<img src="{{ asset('images/bg.jpg') }}" class="img-fluid" alt="Responsive image">

	                        <h3 class="display-5">Judul ganti sendiri</h3>

	                        <p class="lead">Deskripsi ganti sendiri</p>


	                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>