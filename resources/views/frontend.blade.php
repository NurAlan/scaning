<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT. Djarum</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/djarum.png') }}" type="icon/png">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/scrolling-nav.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('vendor/notification/notification.css') }}" rel="stylesheet"> --}}
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">PT. DJARUM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>BARCODE</h1>
        <form  onsubmit="saved(); return false;" method="POST">
          <input type="text" id="barcode" class="form-control" value="" autofocus autocomplete="off">
        </form>
      </div>
    </header>
    <script type="text/javascript">

      function saved(){
        var barcode =  $('#barcode').val();
        $.ajax({
          url      : '{{ url('save')}}',
          type     : 'POST',
          dataType : 'Json',
          data : {
            barcode : barcode,
            _token : '{{csrf_token()}}',
          },
          success : function(data){
            if (data.alert==0)
            {
              alert('error');
            }
            else
            {
              $( document ).ready(function() {
                document.getElementById('barcode').value = ''
              });
              alert(data.message);
            }
          }
        })
      }

    </script>
    <!-- Bootstrap core JavaScript -->
    {{-- <script src="{{ asset('vendor/notification/notification.js')}}"></script> --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom JavaScript for this theme -->
    <script src="{{ asset('js/scrolling-nav.js')}}"></script>

  </body>

</html>
