<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    
    {{-- FAVICONS --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('favicons/site.webmanifest')}}">
    <link rel="mask-icon" href="{{url('favicons/safari-pinned-tab.svg')}}" color="#5bbad5">
    <link rel="shortcut icon" href="{{url('favicons/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="{{url('favicons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">


    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">

    <!-- Dashboard Core -->
    <link href="css/dashboard.css" rel="stylesheet" />
    {{-- JQUERY --}}
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Odometr includes -->
    {{-- <link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-car.css" /> --}}
    {{-- <script src="http://github.hubspot.com/odometer/odometer.js"></script> --}}
    <script src="js/odometer.min.js"></script>
    <link rel="stylesheet" href="css/odometer-theme-default.css"/>

    {{-- PUSHER LIBRARY --}}
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    @include('script.pusher')

    <style type="text/css">
      .odometer {
        font-size: 2.2rem;
      }
    </style>

  </head>
  <body class="pt-5">
    <div class="page">
      <div class="page-main">
        <div class="page-content mt-0">
          <div class="container-fluid">
            <div class="row pb-5 mb-5">
              <div class="col-12 py-2 d-flex align-items-center justify-content-center">
                <img src="{{ url('images/logos/signature-logo-ugm.svg') }}" width="75" class="mr-3">
                <h1 class="page-title text-primary display-4 font-weight-bold" style="font-size: 3rem;">
                  UGM's 2018 Achievements Minute by Minute
                </h1>
              </div>
            </div>
            <div class="row row-cards">
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small id="article_scopus_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ $data['article_scopus']->updated_at->format('j F Y') }}</small>
                      <img src="{{ url('images/icons/journal.svg') }}" width="70">
                    </div>
                    <div class="font-weight-bold mb-3 odometer text-primary" id="article_scopus">{{ $data['article_scopus']->value }}</div>
                    <div class="h5">Journal articles indexed in Scopus</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 ">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small id="article_other_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ $data['article_other']->updated_at->format('j F Y') }}</small>
                      <img src="{{ url('images/icons/journal.svg') }}" width="70">
                    </div>
                    <div class="font-weight-bold mb-3 odometer text-primary" id="article_other">{{ $data['article_other']->value }}</div>
                    <div class="h5">Journal articles indexed in WoS, EBSCO, Proquest, Microsoft Academic, and Pubmed</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small id="proceeding_scopus_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ $data['proceeding_scopus']->updated_at->format('j F Y') }}</small>
                      <img src="{{ url('images/icons/proceeding.svg') }}" width="70">
                    </div>
                    <div class="font-weight-bold mb-3 odometer text-teal" id="proceeding_scopus">{{ $data['proceeding_scopus']->value }}</div>
                    <div class="h5">Proceedings indexed in Scopus</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small id="proceeding_other_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ $data['proceeding_other']->updated_at->format('j F Y') }}</small>
                      <img src="{{ url('images/icons/proceeding.svg') }}" width="70">
                    </div>
                    <div class="font-weight-bold mb-3 odometer text-teal" id="proceeding_other">{{ $data['proceeding_other']->value }}</div>
                    <div class="h5">Proceedings indexed in WoS, EBSCO, Proquest, Microsoft Academic, and Pubmed</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row row-cards mt-0">
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small id="citation_scopus_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ $data['citation_scopus']->updated_at->format('j F Y') }}</small>
                      <img src="{{ url('images/icons/citation.svg') }}" width="70">
                    </div>
                    <div class="font-weight-bold mb-3 text-orange">
                      <span class="odometer" id="citation_scopus">{{ $data['citation_scopus']->value }}</span>
                      /
                      <span class="odometer" style="font-size: 1.5rem;" id="total_citation">{{ $data['total_citation']->value }}</span>
                    </div>
                    <div class="h5">Citations on Scopus in {{ date('Y') }} and accumulation</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small id="book_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ $data['book']->updated_at->format('j F Y') }}</small>
                      <img src="{{ url('images/icons/book.svg') }}" width="70">
                    </div>
                    <div class="font-weight-bold mb-3 odometer text-red" id="book">{{ $data['book']->value }}</div>
                    <div class="h5">Books published</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small id="copyright_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ $data['copyright']->updated_at->format('j F Y') }}</small>
                      <img src="{{ url('images/icons/copyright.svg') }}" width="70">
                    </div>
                    <div class="font-weight-bold mb-3 odometer text-indigo" id="copyright">{{ $data['copyright']->value }}</div>
                    <div class="h5">Copyrights registered</div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card h-100" style="border-radius: 1rem">
                  <div class="card-body">
                    <div class="text-left d-flex justify-content-between">
                      <small id="sinta_account_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ $data['sinta_account']->updated_at->format('j F Y') }}</small>
                      <img src="{{ url('images/icons/account.svg') }}" width="70">
                    </div>
                    <div class="font-weight-bold mb-3 text-success">
                      <span class="odometer" id="sinta_account">{{ $data['sinta_account']->value }}</span>
                      <span>/</span>
                      <span class="odometer" style="font-size: 1.5rem !important;" id="total_staff">{{ $data['total_staff']->value }}</span>
                    </div>
                    <div class="h5">Verified Sinta accounts and total UGM staff</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer" style="font-size: 1rem">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-12 mt-3 mt-lg-0 text-center">
              <a href="#">About</a> | <a href="#">Site Credits</a> | <a href="#">BPP UGM</a> <br>
              Copyright © 2018 <a href="http://publikasi.ugm.ac.id" target="_blank">Badan Penerbit dan Publikasi UGM</a>. 
              {{-- Theme by <a href="https://codecalm.net" target="_blank">codecalm.net</a>. --}}
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
