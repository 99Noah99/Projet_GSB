<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>BitCrypto</title>
      <!-- <link rel="icon" href="img/mini_logo.png" type="image/png"> -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/gijgo.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/scrollable.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/summernote-bs4.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
      <link rel="stylesheet" href="{{ asset('css/material-icons.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/default.css') }}" id="colorSkinCSS">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      <style>
         .border-gris{
            border: 3px solid #ccc;
            border-radius: 10px;
         }
      </style>
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
      <script src="{{ asset('js/jquery1-3.4.1.min.js') }}"></script>
      <script src="{{ asset('js/popper1.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap1.min.js') }}"></script>
      <script src="{{ asset('js/metisMenu.js') }}"></script>
      <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
      <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
      <script src="{{ asset('js/scrollable-custom.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>

   </body>
</html>