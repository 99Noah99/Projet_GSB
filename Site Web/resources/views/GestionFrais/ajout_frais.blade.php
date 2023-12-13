@extends('layout.app')
@section('contenu')
<div class="main_content_iner ">
	<div class="container-fluid p-0 sm_padding_15px">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="white_card card_height_100 mb_30">
					<div class="white_card_header">
						<div class="box_header m-0">
							<div class="main-title">
								<h3 class="m-0">Ajout d'un frais</h3>
							</div>
						</div>
					</div>
                    <form action=" {{ route('GestionFrais.create_frais') }} " method="post">
                        @csrf
                        <div class="white_card_body">
                            <h6 class="card-subtitle mb-2">Veuillez remplir les informations :</h6><br>
                            <div class="mb-3">
                                <label class="form-label">Intitulé du frais</label>
                                <input type="text" name='Intitule' class="form-control" placeholder="Intitulé du frais">
                            </div>
							<div class="mb-3">
								<label class="form-label">Date de dépense</label>
								<input type="date" name='Date_Depense' class="form-control" placeholder="Date de dépense">
							</div>
							<div class="mb-3">
								<label class="form-label">Type de dépense</label>
								<select  class="form-select" name="select_TypeDepense" id="selectOption">
									<option selected="">Choisir son type de dépense</option>
									<?php
									foreach ($types_depenses as $option) {
										if($option->Nom_TypeDepense != 'avion' && $option->Nom_TypeDepense != 'sncf'){ //vérifie que le nom de la dépense n'est pas avion et sncf
											echo "<option value=\"$option->Id_TypeDepense\">$option->Nom_TypeDepense</option>";
										}
										else{
											echo "<option class='showInputText' value=\"$option->Id_TypeDepense\">$option->Nom_TypeDepense</option>";
										}
									}
									?>
								</select>
							</div>
							<div class="row justify-content-center mb-3">
								<div class="col-lg-4 inputTextToShow">
									<label class="form-label">Montant</label>
									<input type="text" name='Montant' class="form-control" placeholder=" Montant du frais">
								</div>
								<div class="col-lg-2"> 		
									<label class="form-label">Quantité</label>
									<input type="number" class="form-control" name="Quantite" id="inputNumber" value="1">
								</div>
                            </div>

							<!-- ajout du fichier -->
							<div class="mb-3">
								<input type="file" class="form-control" id="inputGroupFile02">
							</div>
									
							<!-- input pour l'id mission -->
							<!--la variable id_mission correspond a la mission a laquelle on veut ajouter le frais, celle a été transférer de la page show_mission a ici via l'url -->
							 <input type="hidden" name="id_mission" value="{{ $id_mission }}"> 
							
                  			<button type="submit" class="btn btn-primary w-100">Ajouter</button>
						</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Cacher l'input text au chargement de la page
        $('.inputTextToShow').hide();

        // Détecter le changement dans le menu déroulant
        $('#selectOption').change(function () {
            // Vérifier si l'option sélectionnée a la classe "showInputText"
            if ($(this).find('option:selected').hasClass('showInputText')) {
                // Afficher l'input text
                $('.inputTextToShow').show();
            } else {
                // Cacher l'input text
                $('.inputTextToShow').hide();
            }
        });
    });
</script>


@stop