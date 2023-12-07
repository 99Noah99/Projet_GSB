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
									<h3>--</h3>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="single_analite_content">
									<h4>Nombre de frais</h4>
									<h3>--</h3>
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
			<div class="col-xl-8">
            <div class="white_card mb_30 card_height_100">
					<div class="white_card_header ">
						<div class="box_header m-0">
							<div class="main-title">
								<h3 class="m-0">Mes Frais</h3>
							</div>
                            <div class="page_title_right">
                                <button type="submit" class="btn btn-primary"> Ajout d'un frais</button>
					        </div>
						</div>
					</div>
					<div class="white_card_body pt-0">
						<div class="QA_section">
							<div class="QA_table mb-0 transaction-table">
								<div class="table-responsive">
									<table class="table  ">
										<tbody>
											<tr>
												<td scope="row">
													<span class="sold-thumb"><i class="ti-arrow-up"></i></span>
												</td>
												<td>
													<span class="badge bg-danger">Sold</span>
												</td>
												<td> <img class="small_img" src="img/currency/1.svg" alt=""> Bitcoin </td>
												<td>Using - Bank......4585 </td>
												<td>-0.000234 BTC</td>
												<td>-0.454 USD</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop