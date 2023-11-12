<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>BitCrypto</title>
      <link rel="icon" href="img/mini_logo.png" type="image/png">
      <link rel="stylesheet" href="css/bootstrap1.min.css" />
      <link rel="stylesheet" href="css/themify-icons.css" />
      <link rel="stylesheet" href="css/nice-select.css" />
      <link rel="stylesheet" href="css/gijgo.min.css" />
      <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/scrollable.css" />
      <link rel="stylesheet" href="css/summernote-bs4.css" />
      <link rel="stylesheet" href="css/morris.css">
      <link rel="stylesheet" href="css/material-icons.css" />
      <link rel="stylesheet" href="css/metisMenu.css">
      <link rel="stylesheet" href="css/style1.css" />
      <link rel="stylesheet" href="css/default.css" id="colorSkinCSS">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   </head>
   <body class="crm_body_bg">
      @include('components.menu_gauche')
      <section class="main_content dashboard_part large_header_bg">
         @include('components.bar_haut')
         @section('contenu')
         @show
         @include('components.footer')
      </section>
      <div id="back-top" style="display: none;">
         <a title="Go to Top" href="#">
         <i class="ti-angle-up"></i>
         </a>
      </div>
      <script src="js/jquery1-3.4.1.min.js"></script>
      <script src="js/popper1.min.js"></script>
      <script src="js/bootstrap1.min.js"></script>
      <script src="js/metisMenu.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/perfect-scrollbar.min.js"></script>
      <script src="js/scrollable-custom.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>