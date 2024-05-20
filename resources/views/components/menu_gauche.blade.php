<nav class="sidebar dark_sidebar">
	<div class="logo d-flex justify-content-between">
		<a class="large_logo" href="{{ route('accueil') }}">
		<img src="{{ asset('images/logofinal.png') }}" alt="GSB">
		</a>
		<!-- <a class="small_logo" href="index.html"><img src="img/mini_logo.png" alt=""></a>             -->
		<div class="sidebar_close_icon d-lg-none">
			<i class="ti-close"></i>
		</div>
	</div>
	<ul id="sidebar_menu">
      <li class="">
         <a href="{{ route('accueil') }}">
            <div class="nav_icon_small">
               <i class="fa-solid fa-house"></i>
            </div>
               <div class="nav_title">
               <span>Accueil</span>
            </div>
         </a>
      </li>

	  @role('admin')
	  <li class="">
         <a href="{{ route('show_import') }}">
            <div class="nav_icon_small">
               <i class="fa-solid fa-gear"></i>
            </div>
               <div class="nav_title">
               <span>Import</span>
            </div>
         </a>
      </li>
	  @endrole

	  @role('comptable')
	  <li class="">
         <a href="{{ route('Comptable.show_ListeVisiteur') }}">
            <div class="nav_icon_small">
               <i class="fa-solid fa-money-bill"></i>
            </div>
               <div class="nav_title">
               <span>Gestion comptable</span>
            </div>
         </a>
      </li>
	  @endrole

	  @role('utilisateur')
		<li class>
			<a class="has-arrow" href="#" aria-expanded="false">
				<div class="nav_icon_small">
					<i class="fa-solid fa-money-bill"></i>
				</div>
				<div class="nav_title">
					<span>Mes frais</span>
				</div>
			</a>
			<ul>
				<li><a href="{{ route('GestionFrais.ListeMission') }}">Ma liste de mission</a></li>
				<li><a href="{{ route('GestionFrais.show_create_mission') }}">Ajouter une mission</a></li>
			</ul>
		</li>
		@endrole
	</ul>
</nav>