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
					<div class="modal-body">
						<form action="{{ route('create_account') }}"  method="post">
							@csrf
							<div class="">
								<input type="text" name="Nom" class="form-control" placeholder="Entrer votre Nom">
							</div>
                            <div class="">
								<input type="text" name="Prenom" class="form-control" placeholder="Entrer votre Prénom">
							</div>
                            <div class="">
								<input type="text" name="mail" class="form-control" placeholder="Entrer votre Email">
							</div>
                            <div class="">
								<input type="text" name="username" class="form-control" placeholder="Créer votre identifiant de connexion">
							</div>
							<div class="">
								<input type="password" name="password" class="form-control" placeholder="Créer votre mot de passe">
							</div>
                            
							<button type="submit" class="btn_1 full_width text-center">Créer son compte</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>