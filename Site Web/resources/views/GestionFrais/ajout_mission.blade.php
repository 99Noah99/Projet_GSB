@extends('layout.app')
@section('contenu')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<div class="main_content_iner ">
   <div class="container-fluid p-0 sm_padding_15px">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="white_card card_height_100 mb_30">
               <div class="white_card_header">
                  <div class="box_header m-0">
                     <div class="main-title">
                        <h3 class="m-0">Ajout de Mission</h3>
                     </div>
                  </div>
               </div>
               <form action="{{ route('GestionFrais.create_mission') }}" method='post'>
                @csrf
               <div class="white_card_body">
                  <div class="mb-3">
                      <label class="form-label">Nom de la mission</label>
                      <input type="text" name='Nom_Mission' class="form-control" placeholder="Nom de la mission" required>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Date début</label>
                      <input type="date" name='Date_Debut' min="1979-12-31" min="9999-12-31" class="form-control" placeholder="Date de début" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Date de fin</label>
                     <input type="date" name='Date_Fin' min="1979-12-31" min="9999-12-31" class="form-control" placeholder="Date de fin" required>
                  </div>
                  
                  <div class="mb-3">
                        <label class="form-label">Ville</label>
                        <select id="single" name='Ville' class="js-states form-control" required>
                        </select>             
                  </div>
                  <button type="submit" class="btn btn-primary">Ajouter</button>
               </div>
                </form>
            </div>
         </div>
      </div>
   </div>
   
   <script>
    $('#single').select2({
        placeholder: "Selectionner une ville",
        allowClear: true,
        ajax: {
            url: 'recherche/ville/',
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data.results
                };
            },
        }
    });
    </script>
</div>
@stop