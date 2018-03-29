<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('favicon.ico') }}" />
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>Homepage - tabler.github.io - a responsive, flat and full featured admin template</title>
    <link rel="stylesheet" href="{{ url('css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{ url('assets/js/require.min.js') }}"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
          });
    </script>
    <!-- Dashboard Core -->
    <link href="{{ url('assets/css/dashboard.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/dashboard.js') }}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{ url('assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/plugins/charts-c3/plugin.js') }}"></script>
    <!-- Google Maps Plugin -->
    <link href="{{ url('assets/plugins/maps-google/plugin.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/plugins/maps-google/plugin.js') }}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{ url('assets/plugins/input-mask/plugin.js') }}"></script>

    <style type="text/css">
      .card {
        opacity: 0.8;
      }
    </style>
  </head>
  <body class="">
    <div class="page" style="background: url('{{ url('assets/images/stocks/background.png') }}') center center fixed no-repeat; background-size: cover; padding: 2.5rem 1rem 0 1rem;">
      <div class="page-main">
        <div class="page-content mt-0">
          <div class="container-fluid">
            <div class="row pb-5 mb-5">
              <div class="col-12 py-5 text-center">
                <h1 class="page-title text-white display-4 font-weight-bold m-auto" style="font-size: 3rem; text-shadow: 1px 3px 2px grey;">
                  BPP UGM's Achievements Minute by Minute
                </h1>
              </div>
            </div>
            <div class="row row-cards">
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> 24 March 2018</small>
                      <img src="{{ url('assets/images/icons/journal.svg') }}" width="70">
                    </div>
                    <div class="display-4 font-weight-bold mb-3 text-primary">62</div>
                    <div class="h5">Journal articles indexed in Scopus</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 ">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> 24 March 2018</small>
                      <img src="{{ url('assets/images/icons/journal.svg') }}" width="70">
                    </div>
                    <div class="display-4 font-weight-bold mb-3 text-primary">62</div>
                    <div class="h5">Journal articles indexed in WoS, EBSCO, Microsoft Academic, and Pubmed</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> 24 March 2018</small>
                      <img src="{{ url('assets/images/icons/proceeding.svg') }}" width="70">
                    </div>
                    <div class="display-4 font-weight-bold mb-3 text-teal">62</div>
                    <div class="h5">Proceedings indexed in Scopus</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> 24 March 2018</small>
                      <img src="{{ url('assets/images/icons/proceeding.svg') }}" width="70">
                    </div>
                    <div class="display-4 font-weight-bold mb-3 text-teal">62</div>
                    <div class="h5">Proceedings indexed in WoS, EBSCO, Microsoft Academic, and Pubmed</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row row-cards mt-0">
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> 24 March 2018</small>
                      <img src="{{ url('assets/images/icons/citation.svg') }}" width="70">
                    </div>
                    <div class="display-4 font-weight-bold mb-3 text-orange">62</div>
                    <div class="h5">Citations in Scopus</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> 24 March 2018</small>
                      <img src="{{ url('assets/images/icons/book.svg') }}" width="70">
                    </div>
                    <div class="display-4 font-weight-bold mb-3 text-red">62</div>
                    <div class="h5">Books published</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> 24 March 2018</small>
                      <img src="{{ url('assets/images/icons/copyright.svg') }}" width="70">
                    </div>
                    <div class="display-4 font-weight-bold mb-3 text-yellow">62</div>
                    <div class="h5">Copyrights registered</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> 24 March 2018</small>
                      <img src="{{ url('assets/images/icons/account.svg') }}" width="70">
                    </div>
                    <div class="display-4 font-weight-bold mb-3 text-success">62</div>
                    <div class="h5">Verified Sinta accounts</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer bg-transparent border-0 text-white">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="./docs/index.html">Documentation</a></li>
                    <li class="list-inline-item"><a href="./faq.html">FAQ</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018 <a href="http://publikasi.ugm.ac.id">Badan Penerbit dan Publikasi UGM</a>. Theme by <a href="https://codecalm.net" target="_blank">codecalm.net</a>.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
