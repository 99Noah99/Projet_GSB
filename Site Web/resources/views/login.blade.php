<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>GSB</title>
		<link rel="icon" href="img/mini_logo.png" type="image/png">
		<link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
		<!-- <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" />
			<link rel="stylesheet" href="{{ asset('css/gijgo.min.css') }}" /> -->
		<!-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" /> -->
		<!-- <link rel="stylesheet" href="{{ asset('css/scrollable.css') }}" /> -->
		<!-- <link rel="stylesheet" href="{{ asset('css/summernote-bs4.css') }}" /> -->
		<!-- <link rel="stylesheet" href="{{ asset('css/morris.css') }}"> -->
		<!-- <link rel="stylesheet" href="{{ asset('css/material-icons.css') }}" /> -->
		<!-- <link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}"> -->
		<link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
		<!-- <link rel="stylesheet" href="{{ asset('css/default.css') }}" id="colorSkinCSS"> -->
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->
	</head>
	<body>
      <div class="white_card_header">
            <h1 class="f_w_800 row justify-content-center">Bienvenue sur GSB</h1>
      </div>
		<!-- <div class="white_box mb_30"> -->
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="modal-content cs_modal">
					<div class="modal-header justify-content-center theme_bg_1">
						<h5 class="modal-title text_white">Log in</h5>
					</div>
					<div class="modal-body">
						<form action="{{ route('submit_login') }}"  method="post">
							@csrf
							<div class="">
								<input type="text" name="username" class="form-control" placeholder="Entrer votre identifiant">
							</div>
							<div class="">
								<input type="password" name="password" class="form-control" placeholder="Mot de passe">
							</div>
							<button type="submit" class="btn_1 full_width text-center">Se connecter</button>
							<p>
								<a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="{{ route('show_create_account') }}"> 
								Créer un compte
								</a>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>