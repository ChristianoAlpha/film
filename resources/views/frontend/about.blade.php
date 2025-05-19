{{-- resources/views/frontend/about.blade.php --}}
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="HTML5 Template" />
  <meta name="description" content="DAI-FILMES: Seu portal de cinema online" />
  <meta name="author" content="DAI-FILMES" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Sobre a DAI-FILMES - DAI-FILMES</title>
  <link rel="shortcut icon" href="{{ asset('auth/img/infosi3.png') }}" />

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/animate.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.carousel.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-awesome.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/themify-icons.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/flaticon.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/revolution/css/layers.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/revolution/css/settings.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/prettyPhoto.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/shortcodes.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}"/>

  @stack('styles')
</head>
<body>
  <!-- Preloader -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>

  <!-- Cabeçalho -->
  @include('layouts.site.header')

  <!-- Conteúdo Principal -->
  <div class="page">
    <div class="container my-4">
      <div class="text-center">
        <h2 style="font-weight: bold;">Sobre a DAI-FILMES</h2>
        <p style="max-width: 800px; margin: 0 auto;">
          A <strong>DAI-FILMES</strong> é a plataforma definitiva para amantes de cinema, oferecendo milhares de filmes e séries em alta qualidade, disponíveis 24 horas por dia, onde você estiver.
        </p>
      </div>

      <div class="mt-4">
        <h3 style="font-weight: bold; text-align: center;">Missão</h3>
        <p style="text-align: justify; margin-top: 20px;">
          Nossa missão é aproximar você do melhor do entretenimento audiovisual, proporcionando uma experiência de streaming simples, rápida e acessível, com conteúdos para todas as preferências.
        </p>
      </div>

      <div class="mt-4">
        <h3 style="font-weight: bold; text-align: center;">História</h3>
        <p style="text-align: justify; margin-top: 20px;">
          Fundada em 2023, a DAI-FILMES nasceu da paixão por contar histórias. Em poucos meses, conquistamos milhares de usuários em todo o mundo, sempre inovando em tecnologia e curadoria de conteúdos para garantir maratonas inesquecíveis.
        </p>
      </div>
    </div>
  </div>

  <!-- Rodapé -->
  @include('layouts.site.footer')
  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
