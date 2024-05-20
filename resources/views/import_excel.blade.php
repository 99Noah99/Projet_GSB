@extends('layout.app')

@section('contenu')


<div class="main_content_iner ">
	<div class="container-fluid p-0 sm_padding_15px">
		<div class="row justify-content-center">
			<div class="col-lg-8" style="text-align:center">  
                <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="excel_file" accept=".xls, .xlsx">
                    <button type="submit">Importer Excel</button>
                </form>
			</div>
		</div>
	</div>
</div>
@stop