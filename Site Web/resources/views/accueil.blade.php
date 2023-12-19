@extends('layout.app')

@section('contenu')


<div class="main_content_iner ">
	<div class="container-fluid p-0 sm_padding_15px">
		<div class="row justify-content-center">
			<div class="col-lg-8" style="text-align:center">
                <h1>Bienvenu sur GSB </h1>
                <br>
                Veuillez ajouter vos missions et frais associées :
                <div style="margin-top:10%;">
                    <a href="{{ route('GestionFrais.ListeMission') }}">
                        <button type="submit" class="btn btn-primary" style="margin-right:5%">Accéder à mes missions</button>
                    </a>
                    <a href="{{ route('GestionFrais.show_create_mission') }}">
                        <button type="submit" class="btn btn-primary" style="margin-left:5%">Ajouter une mission</button>
                    </a>
                </div>
			</div>
		</div>
	</div>
</div>
@stop