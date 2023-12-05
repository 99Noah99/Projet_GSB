<nav class="sidebar dark_sidebar">
         <div class="logo d-flex justify-content-between"> 
            <a class="large_logo" href="{{ route('gestion') }}">
               <img src="{{ asset('images/logo7.png') }}" alt="GSB">
            </a>
            <!-- <a class="small_logo" href="index.html"><img src="img/mini_logo.png" alt=""></a>             -->
            <div class="sidebar_close_icon d-lg-none">
               <i class="ti-close"></i>
            </div>
         </div>
         

         
         <ul id="sidebar_menu">
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                    <i class="fa-solid fa-money-bill"></i>
                  </div>
                  <div class="nav_title">
                     <span>Mes frais </span>
                  </div>
               </a>
               <ul>
                  <li><a href="{{ route('GestionFrais.ListeFrais') }}">Ma liste de frais</a></li>
                  <li><a href="index_3.html">Déclarer une dépense</a></li>

               </ul>
            </li>
         </ul>
      </nav>