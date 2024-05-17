<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

@if (\Request::is('rtl'))
  <html dir="rtl" lang="ar">
@else
  <html lang="en" >
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
      <x-demo-metas></x-demo-metas>
  @endif

  <link rel="apple-touch-icon" sizes="576x576" href="../assets/img/illustrations/rocket-white.png">
  <link rel="icon" type="image/png" href="../assets/img/monitor.png">
  <title>
    FallAssist
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <script src="../assets/js/paho.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/5.3.5/mqtt.min.js" integrity="sha512-VZolQu3olpk2H/nWcCy6j9rdnw3Gr1flDu2IWGTUlgBrrkwZjbbPfz9ClLMpsErBSZyfkcpDFwJyyMw+5f5FaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <style>
       span[class^="dot-"]{
      opacity: 0;
   }
   .dot-one{
      animation: dot-one 2s infinite linear
   }
   .dot-two{
      animation: dot-two 2s infinite linear
   }
   .dot-three{
      animation: dot-three 2s infinite linear
   }
   @keyframes dot-one{
      0%{
         opacity: 0;
      }
      15%{
         opacity: 0;
      }
      25%{
         opacity: 1;
      }
      100%{
         opacity: 1;
      }
   }
   @keyframes dot-two{
      0%{
         opacity: 0;
      }
      25%{
         opacity: 0;
      }
      50%{
         opacity: 1;
      }
      100%{
         opacity: 1;
      }
   }
   @keyframes dot-three{
      0%{
         opacity: 0;
      }
      50%{
         opacity: 0;
      }
      75%{
         opacity: 1;
      }
      100%{
         opacity: 1;
      }
   }
::-webkit-scrollbar {
  display: none; 
}

/* Atau hanya scrollbar vertikal */
::-webkit-scrollbar-vertical {
  display: none;
}

/* Atau hanya scrollbar horizontal */
::-webkit-scrollbar-horizontal {
  display: none;
}

/* Atau hanya thumb (bagian yang dapat digerakkan) scrollbar */
::-webkit-scrollbar-thumb {
  display: none;
}
.button-link{
    text-decoration:none;
  }
  .button-link:hover{
    color: #4a3aff;
    text-decoration:none
  }
</style>
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest

  @if(session()->has('success'))
    <div x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
      <p class="m-0">{{ session('success')}}</p>
    </div>
  @endif
    <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  @stack('rtl')
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
