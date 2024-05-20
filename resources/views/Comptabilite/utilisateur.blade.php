@extends('layout.app')
@section('contenu')
<div class="main_content_iner overly_inner ">
   <div class="container-fluid p-0 border-gris" >
      <div class="row">
         <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
               <div class="white_card_header pb-0">
                  <div class="white_box_tittle">
                     <h4>Les visiteurs</h4>
                  </div>
               </div>
               <div class="white_card_body">
                  <div class="QA_section">
                     <div class="QA_table mb-0">
                        <table class="table lms_table_active2 ">
                           <thead>
                              <tr>
                                 <th scope="col">Prenom</th>
                                 <th scope="col">Nom</th>
                                 <th scope="col">Email</th>
                                 <th scope="col">Nombre mission(s)</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody >
                            @foreach($tab_infos_users as $tab_info_user)
                              <tr style='font-size:2px!important'>
                              
                                 <td >{{ $tab_info_user[0]->Prenom }}</td>
                                 <td>{{ $tab_info_user[0]->Nom }}</td>
                                 <td>{{ $tab_info_user[0]->Email }}</td>
                                 <td>{{ $tab_info_user[1] }}</td>
                                 <td>
                                    <a href="{{ route('Comptable.show_ListeMission_ParVisiteur', ['id' => $tab_info_user[0]->Id_Utilisateur]) }}"> 
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
</div>
@stop