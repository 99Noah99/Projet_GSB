@extends('layout.app')

@section('contenu')


<div class="main_content_iner ">
	<div class="container-fluid p-0 sm_padding_15px">
		<div class="row justify-content-center">
			<div class="col-lg-8" style="text-align:center">
                <h1>Bienvenue sur GSB </h1>
                <br>
                @role('utilisateur')
                Veuillez ajouter vos missions et frais associées :
                @endrole
                @role('comptable')
                Veuillez consulter la liste des visiteurs afin de valider ou non leurs missions :
                @endrole
                <div style="margin-top:10%;">

                    @role('utilisateur')
                    <a href="{{ route('GestionFrais.ListeMission') }}">
                        <button type="submit" class="btn btn-primary" style="margin-right:5%">Accéder à mes missions</button>
                    </a>
                    <a href="{{ route('GestionFrais.show_create_mission') }}">
                        <button type="submit" class="btn btn-primary" style="margin-left:5%">Ajouter une mission</button>
                    </a>
                    @endrole

                    @role('comptable')
                    <a href="{{ route('Comptable.show_ListeVisiteur') }}">
                        <button type="submit" class="btn btn-primary" style="margin-right:5%">Liste des visiteurs</button>
                    </a>
                    @endrole

                    @role('admin')
                    <a href="{{ route('show_create_account') }}">
                        <button type="submit" class="btn btn-primary" style="margin-right:5%">Ajouter un nouveau compte</button>
                    </a>
                    @endrole
                </div>

                <div style="margin-top: 10%; ">
                    <img src="{{ asset('images/imgGestionFrais.jpg') }}" alt="Gestion des frais" style="border-radius : 20px !important; overflow: hidden !important;">
                </div>
			</div>
		</div>
	</div>
</div>
@stop