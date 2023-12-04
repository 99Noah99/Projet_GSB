<div class="container-fluid g-0">
   <div class="row">
      <div class="col-lg-12 p-0 ">
         <div class="header_iner d-flex justify-content-between align-items-center">
            <div class="sidebar_icon d-lg-none">
               <i class="ti-menu"></i>
            </div>
            <div class="line_icon open_miniSide d-none d-lg-block">
               <img src="img/line_img.png" alt>
            </div>
            <div class="header_right d-flex justify-content-between align-items-center">
               <div class="profile_info d-flex align-items-center">
                  <div class="profile_thumb mr_20">
                     <img src="g" alt="#">
                  </div>
                  <div class="author_name">
                     <h4 class="f_s_15 f_w_500 mb-0">{{ auth()->user()->Prenom.' '.auth()->user()->Nom }}</h4>
                     <p class="f_s_12 f_w_400">{{ auth()->user()->Email }}</p>
                  </div>
                  <div class="profile_info_iner">
                     <div class="profile_author_name">
                        <p>Manager</p>
                        <h5>Jiue Anderson</h5>
                     </div>
                     <div class="profile_info_details">
                        <a href="#">My Profile </a>
                        <a href="#">Settings</a>
                        <a href="{{ route('Deconnexion') }}">Log Out </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>