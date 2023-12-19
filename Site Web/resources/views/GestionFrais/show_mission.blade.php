@extends('layout.app')
@section('contenu')
<div class="main_content_iner overly_inner ">
	<div class="container-fluid p-0 ">
		<div class="row">
			<div class="col-12">
				<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
					<div class="page_title_left">
						<h3 class="mb-0">Mission : {{ $mission->Nom_Mission }}</h3>
					</div>
					<div class="page_title_right">
						<form action="{{ route('GestionFrais.declare_mission') }}" method="post">
							@csrf
							<input type="hidden" name="id" value="{{ $mission->Id_Mission }}">
							<button type="submit" class="btn btn-primary">Déclarer la mission</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-xl-12">
				<div class="white_card  mb_30">
					<div class="white_card_body anlite_table p-0">
						<div class="row">
							<div class="col-lg-3">
								<div class="single_analite_content">
									<h4>Total Frais</h4>
									<h3>
										{{ $frais->count() }}
									</h3>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single_analite_content">
									<h4>Frais totaux remboursés</h4>
									<h3>
										<?php
											$nbfrais = 0;
											foreach($frais as $unfrais) {
												$nbfrais += $unfrais->Prix_Total;
											}
											echo $nbfrais . " €";
										?>
									</h3>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single_analite_content">
									<h4>Date de début</h4>
									<h4>{{ \Carbon\Carbon::parse($mission->Date_Debut)->format('d/m/Y') }}</h4>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single_analite_content">
									<h4>Date de fin</h4>
									<h4>{{ \Carbon\Carbon::parse($mission->Date_Fin)->format('d/m/Y') }}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- tableau frais -->
			<div class="col-xl-8">
				<div class="white_card mb_30 card_height_100">
					<div class="white_card_header ">
						<div class="box_header m-0">
							<div class="main-title">
								<h3 class="m-0">Mes Frais</h3>
							</div>
							<div class="page_title_right">
								<a href="{{ route('GestionFrais.show_create_frais', ['id_mission' => $mission->Id_Mission]) }}">
								<button type="submit" class="btn btn-primary"> Ajout d'un frais</button>
								</a>
							</div>
						</div>
					</div>
					<div class="white_card_body pt-0">
						<div class="QA_section">
							<div class="QA_table mb-0 transaction-table">
								<div class="table-responsive">
									<table class="table">
										<thead>
                             				<tr>
												<th>Intitulé</th>
												<th>Date de dépense</th>
												<th>Prix total</th>
                              				</tr>
                           				</thead>
										<tbody>
											@forelse($frais as $unfrais) <!-- forelse marche comme un foreach mais permet de dire quoi afficher si c'est vide -->
											<tr>
												<td>{{ $unfrais->Intitule }}</td>
												<td>{{ $unfrais->Date_Depense }}</td>
												<td>{{ $unfrais->Prix_Total }}</td>
												<td>
													<a href="{{ route('GestionFrais.delete_frais', ['id' => $unfrais->Id_Frais]) }}"> 
														<button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fa-xs"></i></button>
													</a>
                                 				</td>
											</tr>
											@empty <!-- affiche si il y a pas de résultat -->
											<tr><td colspan="3" style="text-align:center">Aucun frais n'est disponible</td></tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- tableau document -->
			<div class="col-xl-4">
				<div class="white_card card_height_100 mb_30">
					<div class="white_card_header">
						<div class="box_header m-0">
							<div class="main-title">
								<h3 class="m-0">Mes documents</h3>
							</div>
						</div>
					</div>
					<div class="white_card_body">
						<div class="table-responsive">
							<table class="table">
								<thead>
                             		<th> Nom du fichier </th>
									 <th> Télécharger </th>
                           		</thead>
								<tbody>
									
									@foreach($frais as $unfrais)
									<tr>
										<td>
											{{ $unfrais->NomBase_Justificatif }}
										</td>
										<td> 
											<a href="{{ route('GestionFrais.donwload_document', $unfrais->Id_Frais) }}" target="_blank">
												<button type="button" class="btn btn-primary"><i class="fa-regular fa-eye fa-xs"></i></button>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop