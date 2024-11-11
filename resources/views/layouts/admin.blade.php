<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>BigBen</title>
  <link rel="apple-touch-icon" href="{{asset('lecture-images/BOX SHIPING.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('lecture-images/BOX SHIPING.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link href="https://vjs.zencdn.net/7.20.2/video-js.css" rel="stylesheet" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet"/>
  <link rel=stylesheet href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/select/selectize.css')}}">

  <!-- BEGIN VENDOR CSS-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/vendors.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/meteocons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/charts/morris.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/charts/chartist.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/selects/selectize.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/selects/selectize.default.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/menu/menu-types/vertical-content-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/timeline.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/dashboard-ecommerce.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/forms/checkboxes-radios.css')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- END Page Level CSS-->
  <!-- boootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
  <style>
    a.menu-item {
    text-decoration: none;
  }
  html body .content.app-content {
      overflow: auto;
  }
  a.ytp-watermark.yt-uix-sessionlink{
      display: none !important;
  }
  .ytp-chrome-top.ytp-show-cards-title{
      display: none !important;
  }
  </style>
  @livewireStyles
  @stack('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
  <!-- fixed-top-->
  @auth
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-hide-on-scroll navbar-border navbar-shadow navbar-brand-center" style="height: 9%;">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="{{ route("home_admin") }}">
              {{-- <img class="brand-logo" alt="modern admin logo" src="{{asset('images/lechef.jpg')}}"> --}}
              <h3 class="brand-text">{{auth()->user()->name}}</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>


          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">{{auth()->user()->name}}</span>
                </span>
                <span class="avatar avatar-online">
                  {{-- <img src="{{asset('images/lechef.jpg')}}" alt="avatar"><i></i></span> --}}
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">

                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
            {{-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
              <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
              </div>
            </li> --}}

            <li class="dropdown dropdown-notification nav-item">

            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content mt-2">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="la la-align-right"></i><span class="menu-title" data-i18n="nav.dash.main">Unit</span></a>
              <ul class="menu-content">
                <li class="{{ Route::currentRouteName() == "show_unit" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_unit") }}" data-i18n="nav.dash.ecommerce">show unit</a>
                </li>
                <li class="{{ Route::currentRouteName() == "add_unit" ? 'active':'' }}"><a class="menu-item" href="{{ route("add_unit") }}" data-i18n="nav.dash.ecommerce">add unit</a>
                </li>

              </ul>
            </li>

            <li class=" nav-item"><a href="index.html"><i class="fas fa-book"></i><span class="menu-title" data-i18n="nav.dash.main">Lectures</span></a>
              <ul class="menu-content">
                <li class="{{ Route::currentRouteName() == "lecture_add" ? 'active':'' }}"><a class="menu-item" href="{{ route("lecture_add") }}" data-i18n="nav.dash.ecommerce">Lecture add</a>
                </li>
                <li class="{{ Route::currentRouteName() == "lecture_index" ? 'active':'' }}"><a class="menu-item" href="{{ route("lecture_index") }}" data-i18n="nav.dash.ecommerce"> Lecture index</a>
                </li>

              </ul>
            </li>

            <li class=" navigation-header"> 
              <span data-i18n="nav.category.layouts">Subscribtions</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="fas fa-credit-card"></i><span class="menu-title" data-i18n="nav.dash.main">Students Sub</span></a>
              <ul class="menu-content">
                <li class="{{ Route::currentRouteName() == "subscript_add" ? 'active':'' }}"><a class="menu-item" href="{{ route("subscript_add") }}" data-i18n="nav.dash.ecommerce">Add Subscribtions </a>
                </li>
                <li class="{{ Route::currentRouteName() == "subscript_index" ? 'active':'' }}"><a class="menu-item" href="{{ route("subscript_index") }}" data-i18n="nav.dash.ecommerce"> Subscribtions index</a>
                </li>
                <li class="{{ Route::currentRouteName() == "student_wallet" ? 'active':'' }}"><a class="menu-item" href="{{ route("student_wallet") }}" data-i18n="nav.dash.ecommerce"> Student Wallet</a>
                </li>
                <li class="{{ Route::currentRouteName() == "subscript_delete" ? 'active':'' }}"><a class="menu-item" href="{{ route("subscript_delete") }}" data-i18n="nav.dash.ecommerce"> Delete subscription</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header"> 
              <span data-i18n="nav.category.layouts">Transactions</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>

            <li class=" nav-item"><a href="index.html"><i class="fas fa-credit-card"></i><span class="menu-title" data-i18n="nav.dash.main">All Transactions</span></a>
              <ul class="menu-content">
                <li class="{{ Route::currentRouteName() == "transactions" ? 'active':'' }}"><a class="menu-item" href="{{ route("transactions") }}" data-i18n="nav.dash.ecommerce">Show  </a>
                </li>
              </ul>
            </li>


            <li class=" navigation-header"> 
                <span data-i18n="nav.category.layouts">Videos</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
                data-placement="right" data-original-title="Layouts"></i>
              </li>
            <li class=" nav-item"><a href=""><i class="la la-file-video-o"></i><span class="menu-title" data-i18n="nav.dash.main">Videos</span></a>
                <ul class="menu-content">
                  <li class="{{ Route::currentRouteName() == "add_video" ? 'active':'' }}"><a class="menu-item" href="{{ route("select_year_video") }}" data-i18n="nav.dash.ecommerce">add video</a>
                  </li>
                  <li class="{{ Route::currentRouteName() == "add_free_video" ? 'active':'' }}"><a class="menu-item" href="{{ route("add_free_video") }}" data-i18n="nav.dash.ecommerce">add free video</a>
                  </li>
                  <li class="{{ Route::currentRouteName() == "show_free_video" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_free_video") }}" data-i18n="nav.dash.ecommerce">Show free videos </a>
                  </li>
                  <?php
                          $url="http://127.0.0.1:8000";

                  ?>
                  <li class="{{ Route::currentRouteName() == "show_lecture_videos" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_lecture_videos") }}" data-i18n="nav.dash.ecommerce"> Lecture Videos </a>
                  </li>
                  {{-- <li class="{{ url()->current() == "$url/show_video/ONE" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_video",['year_type'=>"ONE"]) }}" data-i18n="nav.dash.ecommerce">First grade secondary</a>
                  </li>

                  <li class="{{ url()->current() == "$url/show_video/TWO" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_video",['year_type'=>"TWO"]) }}" data-i18n="nav.dash.ecommerce">Secound grade secondary</a>
                  </li>

                  <li class="{{ url()->current() == "$url/show_video/THREE" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_video",['year_type'=>"THREE"]) }}" data-i18n="nav.dash.ecommerce">Third grade secondary</a>
                  </li> --}}
                </ul>
              </li>
              <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Exams</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
                data-placement="right" data-original-title="Layouts"></i>
              </li>
              <li class=" nav-item"><a href=""><i class="lla la-files-o"></i><span class="menu-title" data-i18n="nav.dash.main">Exams</span></a>
                <ul class="menu-content">
                  <li class="{{ Route::currentRouteName() == "select_year_exam" ? 'active':'' }}"><a class="menu-item" href="{{ route("select_year_exam") }}" data-i18n="nav.dash.ecommerce">add exam</a>
                  </li>
                  <?php
                          $url="http://127.0.0.1:8000";

                  ?>
                  <li class="{{ url()->current() == "$url/show_exams/ONE" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_exam",['year_type'=>"ONE"]) }}" data-i18n="nav.dash.ecommerce">First grade secondary</a>
                  </li>

                  <li class="{{ url()->current() == "$url/show_exams/TWO" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_exam",['year_type'=>"TWO"]) }}" data-i18n="nav.dash.ecommerce">Secound grade secondary</a>
                  </li>

                  <li class="{{ url()->current() == "$url/show_exams/THREE" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_exam",['year_type'=>"THREE"]) }}" data-i18n="nav.dash.ecommerce">Third grade secondary</a>
                  </li>
                </ul>
              </li>

              <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Students</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
                data-placement="right" data-original-title="Layouts"></i>
              </li>
              <li class=" nav-item"><a href="index.html"><i class="la la-male"></i><span class="menu-title" data-i18n="nav.dash.main">Students</span></a>
                <ul class="menu-content">
                  <?php
                          $url="http://127.0.0.1:8000";
                  ?>
                  <li class="{{ Route::currentRouteName() == "add_student" ? 'active':'' }}"><a class="menu-item" href="{{ route("add_student") }}" data-i18n="nav.dash.ecommerce">Add student</a>
                  </li>
                  <li class="{{ Route::currentRouteName() == "student_search" ? 'active':'' }}"><a class="menu-item" href="{{ route("student_search") }}" data-i18n="nav.dash.ecommerce">Student Search</a>
                  </li>
                  <li class="{{ url()->current() == "$url/show_student/ONE" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_student",['year_type'=>"ONE"]) }}" data-i18n="nav.dash.ecommerce">First grade secondary</a>
                  </li>

                  <li class="{{ url()->current() == "$url/show_student/TWO" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_student",['year_type'=>"TWO"]) }}" data-i18n="nav.dash.ecommerce">Secound grade secondary</a>
                  </li>

                  <li class="{{ url()->current() == "$url/show_student/THREE" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_student",['year_type'=>"THREE"]) }}" data-i18n="nav.dash.ecommerce">Third grade secondary</a>
                  </li>
                </ul>
              </li>

              <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Questions</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
                data-placement="right" data-original-title="Layouts"></i>
              </li>
              <li class=" nav-item"><a href="index.html"><i class="la la-question"></i><span class="menu-title" data-i18n="nav.dash.main">Questions</span></a>
                <ul class="menu-content">
                  <?php
                          $url="http://127.0.0.1:8000";
                  ?>


                  <li class="{{ Route::currentRouteName() == "monquestiontype" ? 'active':'' }}"><a class="menu-item" href="{{ route("monquestiontype") }}" data-i18n="nav.dash.ecommerce">add question</a>
                  </li>
                  <li class="{{ Route::currentRouteName() == "admoney_block" ? 'active':'' }}"><a class="menu-item" href="{{ route("admoney_block") }}" data-i18n="nav.dash.ecommerce">add Block</a>
                  </li>
                  <ul class="menu-content">
                    <?php
                            $url="http://127.0.0.1:8000";
                    ?>
                    <li class="{{ url()->current() == "$url/moneyshowquestuion/ONE" ? 'active':'' }}"><a class="menu-item" href="{{ route("moneyshowquestuion",['year_type'=>"ONE"]) }}" data-i18n="nav.dash.ecommerce">First grade secondary</a>
                    </li>

                    <li class="{{ url()->current() == "$url/moneyshowquestuion/TWO" ? 'active':'' }}"><a class="menu-item" href="{{ route("moneyshowquestuion",['year_type'=>"TWO"]) }}" data-i18n="nav.dash.ecommerce">Secound grade secondary</a>
                    </li>

                    <li class="{{ url()->current() == "$url/moneyshowquestuion/THREE" ? 'active':'' }}"><a class="menu-item" href="{{ route("moneyshowquestuion",['year_type'=>"THREE"]) }}" data-i18n="nav.dash.ecommerce">Third grade secondary</a>
                    </li>
                  </ul>


                </ul>
              </li>

              <li class=" navigation-header"> 
                <span data-i18n="nav.category.layouts">Questions & Answers</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
                data-placement="right" data-original-title="Layouts"></i>
              </li>
              <li class=" nav-item"><a href="index.html"><i class="fas fa-credit-card"></i><span class="menu-title" data-i18n="nav.dash.main">Students Questions</span></a>
                <ul class="menu-content">
                  <li class="{{ Route::currentRouteName() == "show-questions" ? 'active':'' }}"><a class="menu-item" href="{{ route("show-questions") }}" data-i18n="nav.dash.ecommerce">All Questions </a>
                  </li>
                </ul>
              </li>

              <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Slider</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
                data-placement="right" data-original-title="Layouts"></i>
              </li>
              <li class=" nav-item"><a href=""><i class="la la-sliders"></i><span class="menu-title" data-i18n="nav.dash.main">Slider</span></a>
                <ul class="menu-content">
                  <?php
                          $url="http://127.0.0.1:8000";
                  ?>
                  <li class="{{ Route::currentRouteName() == "add_slider" ? 'active':'' }}"><a class="menu-item" href="{{ route("add_slider") }}" data-i18n="nav.dash.ecommerce">add slider</a>
                  </li>

                  <li  class="{{ Route::currentRouteName() == "show_slider" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_slider") }}" data-i18n="nav.dash.ecommerce">show slider</a>
                  </li>


                </ul>
              </li>


              <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Document</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
                data-placement="right" data-original-title="Layouts"></i>
              </li>
              <li class=" nav-item"><a href=""><i class="fa fa-file" aria-hidden="true"></i><span class="menu-title" data-i18n="nav.dash.main">Documents</span></a>
                <ul class="menu-content">
                  <?php
                          $url="http://127.0.0.1:8000";
                  ?>
                  <li class="{{ Route::currentRouteName() == "add_file" ? 'active':'' }}"><a class="menu-item" href="{{ route("add_file") }}" data-i18n="nav.dash.ecommerce">add document</a>
                  </li>

                  <li  class="{{ url()->current() == "$url/show_files/ONE" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_files",['year_type'=>"ONE"]) }}" data-i18n="nav.dash.ecommerce">show first year</a>
                  </li>
                  <li  class="{{ url()->current() == "$url/show_files/TWO" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_files",['year_type'=>"TWO"]) }}" data-i18n="nav.dash.ecommerce">show second year</a>
                  </li>
                  <li  class="{{ url()->current() == "$url/show_files/THREE" ? 'active':'' }}"><a class="menu-item" href="{{ route("show_files",['year_type'=>"THREE"]) }}" data-i18n="nav.dash.ecommerce">show third year</a>
                  </li>
                </ul>
              </li>                  
        </div>
      </div>
      <div class="content-body">
        <!-- eCommerce statistic -->
        {{ $slot }}
        <!--/ Basic Horizontal Timeline -->
      </div>
    </div>
  </div>
  @endauth
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- BEGIN VENDOR JS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

  <script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('admin/app-assets/vendors/js/ui/headroom.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/app-assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}"
  type="text/javascript"></script>
  <script src="{{asset('admin/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('admin/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->

  <!-- BEGIN PAGE LEVEL JS-->
  <script src="http://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
  <script  src="{{asset('admin/app-assets/select/electize.js')}}"></script>



  <script src="{{asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}" type="text/javascript"></script>
  @livewireScripts
  @stack('scripts')
</body>


</html>
