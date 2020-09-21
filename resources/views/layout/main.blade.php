<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Materialize Stepper CSS -->
    <link type="text/css" rel="stylesheet" href="{{URL::to('css/mstepper.min.css')}}" media="screen,projection" />

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.21/datatables.min.css"/> -->

    <!-- Search Combobox teaa -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />


    <!-- multiple row ajax insertion -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="bootstrap.min.css" />

    <title>@yield('title')</title>
    <link rel="icon" href= {{URL::to('asset/logo.png')}}>

    <style>
        @import url("https://fonts.googleapis.com/css?family=Cardo:400i|Rubik:400,700&display=swap");
        :root {
        --d: 700ms;
        --e: cubic-bezier(0.19, 1, 0.22, 1);
        --font-sans: 'Rubik', sans-serif;
        --font-serif: 'Cardo', serif;
        }

        * {
        box-sizing: border-box;
        }

        .page-content {
        display: grid;
        grid-gap: 1rem;
        margin: 0 auto;
        font-family: var(--font-sans);
        }
        @media (min-width: 200px) {
        .page-content {
            grid-template-columns: repeat(2, 1fr);
        }
        }
        @media (min-width: 300px) {
        .page-content {
            grid-template-columns: repeat(4, 1fr);
        }
        }
        
        .cardz {
        position: relative;
        display: -webkit-box;
        display: flex;
        margin-top: 15px;
        -webkit-box-align: end;
                align-items: flex-end;
        overflow: hidden;
        width: 100%;
        text-align: center;
        color: whitesmoke;
        background-color: whitesmoke;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.1), 0 4px 4px rgba(0, 0, 0, 0.1), 0 8px 8px rgba(0, 0, 0, 0.1), 0 16px 16px rgba(0, 0, 0, 0.1);
        }
        @media (min-width: 300px) {
        .cardz {
            /* ukuran si cardnya */
            height: 180px;
        }
        }
        .cardz:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: 0 0;
        -webkit-transition: -webkit-transform calc(var(--d) * 1.5) var(--e);
        transition: -webkit-transform calc(var(--d) * 1.5) var(--e);
        transition: transform calc(var(--d) * 1.5) var(--e);
        transition: transform calc(var(--d) * 1.5) var(--e), -webkit-transform calc(var(--d) * 1.5) var(--e);
        pointer-events: none;
        }
        .cardz:after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 200%;
        pointer-events: none;
        background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0)), color-stop(11.7%, rgba(0, 0, 0, 0.009)), color-stop(22.1%, rgba(0, 0, 0, 0.034)), color-stop(31.2%, rgba(0, 0, 0, 0.072)), color-stop(39.4%, rgba(0, 0, 0, 0.123)), color-stop(46.6%, rgba(0, 0, 0, 0.182)), color-stop(53.1%, rgba(0, 0, 0, 0.249)), color-stop(58.9%, rgba(0, 0, 0, 0.32)), color-stop(64.3%, rgba(0, 0, 0, 0.394)), color-stop(69.3%, rgba(0, 0, 0, 0.468)), color-stop(74.1%, rgba(0, 0, 0, 0.54)), color-stop(78.8%, rgba(0, 0, 0, 0.607)), color-stop(83.6%, rgba(0, 0, 0, 0.668)), color-stop(88.7%, rgba(0, 0, 0, 0.721)), color-stop(94.1%, rgba(0, 0, 0, 0.762)), to(rgba(0, 0, 0, 0.79)));
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.009) 11.7%, rgba(0, 0, 0, 0.034) 22.1%, rgba(0, 0, 0, 0.072) 31.2%, rgba(0, 0, 0, 0.123) 39.4%, rgba(0, 0, 0, 0.182) 46.6%, rgba(0, 0, 0, 0.249) 53.1%, rgba(0, 0, 0, 0.32) 58.9%, rgba(0, 0, 0, 0.394) 64.3%, rgba(0, 0, 0, 0.468) 69.3%, rgba(0, 0, 0, 0.54) 74.1%, rgba(0, 0, 0, 0.607) 78.8%, rgba(0, 0, 0, 0.668) 83.6%, rgba(0, 0, 0, 0.721) 88.7%, rgba(0, 0, 0, 0.762) 94.1%, rgba(0, 0, 0, 0.79) 100%);
        -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
        -webkit-transition: -webkit-transform calc(var(--d) * 2) var(--e);
        transition: -webkit-transform calc(var(--d) * 2) var(--e);
        transition: transform calc(var(--d) * 2) var(--e);
        transition: transform calc(var(--d) * 2) var(--e), -webkit-transform calc(var(--d) * 2) var(--e);
        }
        .cardz:nth-child(1):before {
        background-image: url(https://coolbackgrounds.io/images/backgrounds/index/ranger-4df6c1b6.png);
        }
        .cardz:nth-child(2):before {
        background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRhNV9lSpsEBrTMwsdBr1wqPuZDHu3uKQ15gg&usqp=CAU);
        }
        .cardz:nth-child(3):before {
        background-image: url(https://coolbackgrounds.io/images/backgrounds/index/ranger-4df6c1b6.png);
        }
        .cardz:nth-child(4):before {
        background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRhNV9lSpsEBrTMwsdBr1wqPuZDHu3uKQ15gg&usqp=CAU);
        }

        .content {
        position: relative;
        /* display: -webkit-box; */
        /* display: flex; */
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
                flex-direction: column;
        -webkit-box-align: center;
                align-items: center;
        width: 100%;
        padding: 1rem;
        -webkit-transition: -webkit-transform var(--d) var(--e);
        transition: -webkit-transform var(--d) var(--e);
        transition: transform var(--d) var(--e);
        transition: transform var(--d) var(--e), -webkit-transform var(--d) var(--e);
        z-index: 1;
        text-align: center; margin: 0 auto
        }
        .content > * + * {
        margin-top: 1rem;
        }

        .title {
        font-size: 1.3rem;
        font-weight: bold;
        text-align: center;
        margin: 0 auto;
        }

        .copy {
        font-family: var(--font-serif);
        font-size: 1.125rem;
        font-style: italic;
        line-height: 1.35;
        margin: 0 auto;
        }

        .btn {
        cursor: pointer;
        margin-top: 1.5rem;
        padding: 0.75rem 1.5rem;
        font-size: 0.65rem;
        font-weight: bold;
        letter-spacing: 0.025rem;
        text-transform: uppercase;
        color: white;
        background-color: #87a324;
        border: none;
        }
        .btn:hover {
        background-color: #5b6f18;
        color: white;
        }
        .btn:focus {
        outline: 1px dashed yellow;
        outline-offset: 3px;
        }

        @media (hover: hover) and (min-width: 600px) {
        .cardz:after {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
        }

        .content {
            -webkit-transform: translateY(calc(100% - 4.5rem));
                    transform: translateY(calc(100% - 4.5rem));
        }
        .content > *:not(.title) {
            opacity: 0;
            -webkit-transform: translateY(1rem);
                    transform: translateY(1rem);
            -webkit-transition: opacity var(--d) var(--e), -webkit-transform var(--d) var(--e);
            transition: opacity var(--d) var(--e), -webkit-transform var(--d) var(--e);
            transition: transform var(--d) var(--e), opacity var(--d) var(--e);
            transition: transform var(--d) var(--e), opacity var(--d) var(--e), -webkit-transform var(--d) var(--e);
        }

        .cardz:hover,
        .cardz:focus-within {
            -webkit-box-align: center;
                    align-items: center;
        }
        .cardz:hover:before,
        .cardz:focus-within:before {
            -webkit-transform: translateY(-4%);
                    transform: translateY(-4%);
        }
        .cardz:hover:after,
        .cardz:focus-within:after {
            -webkit-transform: translateY(-50%);
                    transform: translateY(-50%);
        }
        .cardz:hover .content,
        .cardz:focus-within .content {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
        }
        .cardz:hover .content > *:not(.title),
        .cardz:focus-within .content > *:not(.title) {
            opacity: 1;
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            -webkit-transition-delay: calc(var(--d) / 8);
                    transition-delay: calc(var(--d) / 8);
        }

        .cardz:focus-within:before, .card:focus-within:after,
        .cardz:focus-within .content,
        .cardz:focus-within .content > *:not(.title) {
            -webkit-transition-duration: 0s;
                    transition-duration: 0s;
        }
      }
      .bannerContainer{
        min-height: 300px;position: relative;z-index: 1;overflow: hidden;
      }
      .bannerBG{
        height: 260px;overflow: hidden;background: url("https://stillmed.olympic.org/media/Images/OlympicOrg/News/2019/12/11/2019-12-11-mountain-day-featured-01.jpg") 0px 0px repeat-x;margin-bottom: 20px;background-repeat:no-repeat;
      }
      .bannerTexture{
        overflow: hidden;background:url({{URL::to('asset/banner.png')}}) 0px 0px no-repeat; 
      }
      .bannerInside{
        width: 100%;max-width: 1500px;height: 260px;position: relative;margin: 0 auto;overflow: hidden;
      }
      .bannerTextNoBack{
        height: 260px;line-height: 230px;color: #ffffff;padding: 0 20px;position: relative;font-size:40pt;
      }
    </style>
     @yield('css')
  </head>

  <body style="overflow-x :hidden; background-color: #F6FAF1;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="{{url('/')}}">    
    <img src={{URL::to('asset/logo.png')}} width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Abdimas
  </a>
</nav>
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" id="navbarUtama">
        <a class="nav-item nav-link active" href="{{url('/')}}" >Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="{{url('/seminar')}}">Seminar </a>
        <a class="nav-item nav-link" href="{{url('/sertifikat')}}">Sertifikat</a>
        <a class="nav-item nav-link" href="{{url('/about')}}">About</a>
        <a class="nav-item nav-link" href="{{url('/user')}}">User</a>
        <a class="nav-item nav-link" href="{{url('/topik')}}">Topik</a>
        <a class="nav-item nav-link" href="{{url('/create')}}">+ Buat Daftar &nbsp;&nbsp;&nbsp;</a>
      
        <form class="form-inline ">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

  
  </div>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
               
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin:auto">
                    <img src="https://is4-ssl.mzstatic.com/image/thumb/Purple123/v4/9a/c1/5d/9ac15dd5-0614-52b5-6fe8-19df1b6dfad6/AppIcon-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/246x0w.png" width="auto" height="30" class="d-inline-block align-top" alt="" loading="lazy" style="border-radius: 50%;">
                    &nbsp;
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item" href="{{url('profile/'.Auth::user()->id)}}">
                            {{ __('Profile') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
  </div>
  
</nav>

<div class="row ">
@php
    $count = 0;
  @endphp
@yield('back_button')
    @yield('container')
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <!-- bawaan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src=" {{ URL::to('js/image-picker.min.js') }} ">  </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



    <!--Search Combobox-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- Multiple row ajax insertion
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

    <!-- Materialize Stepper Scriptnya -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{URL::to('js/mstepper.js')}}"></script>




    <!-- datatables-->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.21/datatables.min.js"></script> -->
    <!-- <script type="text/javascript">
    $( '#navbarNavAltMarkup .navbar-nav' ).on( 'click', function () {
      $( '#navbarNavAltMarkup .navbar-nav' ).find( 'a.active' ).removeClass( 'active' );
      // dd(a.active);
      console.log("asdbsaidbsdbskdasjkdbasjkdbasjkdsbk");
      $( this ).parent( 'a' ).addClass( 'active' );
    });
    </script> -->

    <!-- Search Combobox JQuery -->
  <script type="text/javascript">
  // $(document).on('select2:select','.mdb-select',function(){
      $(".combox").select2({
            placeholder: "Pilih Salah Satu",
            allowClear: true,
        });
    </script>


  <script>
    function goBack() {
      window.history.back();
    }
  </script>
      
     <!--nyobain ngitung -->
    <!-- <script type="text/javascript">
      function hitung() {
        <?php $count +=1 ?>
      }
    </script> -->

    <!-- buat paging tapi kok gagal ... -->
    <script type="text/javascript">
      $(document).ready(function() {
          $("#navbarUtama a").click(function() {
              $( '#navbarUtama' ).find( 'a.active' ).removeClass( 'active' );
              console.log("asdbsabdsbdaskdbaskdsbdj");
              $( this ).parent( 'a' ).addClass( 'active' );
              });
      });
    </script>

    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
    </script>


    <!-- punya si live searching
    <script type="text/javascript">
      $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
          type : 'get',
          url : '{{URL::to('search')}}',
          data:{'search':$value},
          success:function(data){
            $('tbody').html(data);
          }
        });
      })
    </script> -->

    <script type="text/javascript">
      $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
    


    <!-- Script Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    
    <!-- Material stepper -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          var sideNav = document.querySelector('.toc-wrapper');
          var footer = document.querySelector('#footer');
          console.log(sideNav.offsetHeight)
          M.Pushpin.init(sideNav, { top: sideNav.offsetTop, offset: 77, bottom: footer.offsetTop + footer.offsetHeight - 350 });
          var scrollSpy = document.querySelectorAll('.scrollspy');
          M.ScrollSpy.init(scrollSpy);
      });

      var domSteppers = document.querySelectorAll('.stepper.demos');
      for (var i = 0, len = domSteppers.length; i < len; i++) {
          var domStepper = domSteppers[i];
          new MStepper(domStepper);
      }

      function someFunction(destroyFeedback) {
          setTimeout(function () {
            destroyFeedback(true);
          }, 1000);
      }
    </script>

    <!-- Datatables -->
    <script type="text/javascript">
          $(document).ready(function() {
              $('#dt').DataTable();
          });
    </script>

@yield('jquery')
  </body>
</html>