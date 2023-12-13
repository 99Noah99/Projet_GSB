@extends('layout.app')
@section('contenu')
<div class="main_content_iner overly_inner ">
   <div class="container-fluid p-0 border-gris" >
      <div class="row">
         <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
               <div class="white_card_header pb-0">
                  <div class="white_box_tittle">
                     <h4>Mes Missions</h4>
                  </div>
               </div>
               <div class="white_card_body">
                  <div class="QA_section">
                     <div class="QA_table mb-0">
                        <table class="table lms_table_active2 ">
                           <thead>
                              <tr>
                                 <th scope="col">Nom</th>
                                 <th scope="col">Date Début</th>
                                 <th scope="col">Date Fin</th>
                                 <th scope="col">Ville</th>
                                 <th scope="col">Statut de validation</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody >
                            @foreach($missions as $mission)
                              <tr style='font-size:2px!important'>
                                 <td >{{ $mission->Nom_Mission }}</td>
                                 <td>{{ \Carbon\Carbon::parse($mission->Date_Debut)->format('d/m/Y') }}</td>
                                 <td>{{ \Carbon\Carbon::parse($mission->Date_Fin)->format('d/m/Y') }}</td>
                                 <td>{{ $mission->ville->Nom_Ville }}</td>
                                 <td>@if(isset($mission->dernier_historique_statut->statut->Id_Statut)) {!! \App\Http\Controllers\GestionMissionController::badge($mission->dernier_historique_statut->statut->Id_Statut) !!} @endif </td>
                                 <td>
                                    <a href="{{ route('GestionFrais.show_mission', ['id' => $mission->Id_Mission]) }}"> 
                                       <button type="button" class="btn btn-primary"><i class="fa-regular fa-eye fa-xs"></i></button>
                                    </a>
                                    <a href="{{ route('GestionFrais.delete_mission', ['id' => $mission->Id_Mission]) }}"> 
                                       <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fa-xs"></i></button>
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
</div>
@stop