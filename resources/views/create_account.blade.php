<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>GSB</title>
		<link rel="icon" href="img/mini_logo.png" type="image/png">
		<link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
	</head>
	<body>
      <div class="white_card_header">
            <h1 class="f_w_800 row justify-content-center">Nouveau compte</h1>
      </div>
		<!-- <div class="white_box mb_30"> -->
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="modal-content cs_modal">
					<div class="modal-header justify-content-center theme_bg_1">
						<h5 class="modal-title text_white">Register</h5>
					</div>
					<div class="card-body">
						<form action="{{ route('create_account') }}"  method="post">
							@csrf
							<div class="mt-2">
								<input type="text" name="Nom" class="form-control" placeholder="Entrer le Nom">
							</div>
                            <div class="mt-2">
								<input type="text" name="Prenom" class="form-control" placeholder="Entrer le Prénom">
							</div>
                            <div class="mt-2">
								<input type="text" name="mail" class="form-control" placeholder="Entrer le Email">
							</div>
                            <div class="mt-2">
								<input type="text" name="username" class="form-control" placeholder="Créer l'identifiant de connexion">
							</div>
							<div class="mt-2">
								<input type="password" name="password" class="form-control" placeholder="Créer le mot de passe">
							</div>
                            <div class="mt-2">
                                <select name="id_fonction" class="form-select">
                                    <option disabled>Choisir une fonction</option>
                                    @foreach($fonctions as $fonction)
                                        <option value="{{ $fonction->Id_Fonction }}">{{ $fonction->Nom_Fonction }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <select name="id_role" class="form-select">
                                    <option disabled>Choisir une permission</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
							<div class="mt-3 mx-auto w-1/2" style="width:50%">
                                <button type="submit" class="btn_1 text-center" style="width:100%">Créer son compte</button>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>