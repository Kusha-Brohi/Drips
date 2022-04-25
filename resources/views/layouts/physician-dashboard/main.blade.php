<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Admin">
        <meta name="author" content="Admin">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset(!empty($favicon->img_path)?$favicon->img_path:'')}}">
        <title>{{ config('app.name') }}</title>
        <!-- ============================================================== -->
        <!-- All CSS LINKS IN BELOW FILE -->
        <!-- ============================================================== -->
         @include('layouts.physician-dashboard.front.css')
        @yield('css')

    </head>
    <body class="loginbackground">
      

    
        @yield('content')
            <div class="modal fade ecc_card_modal" id="ecc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="est_modal modal-body"></div>
          </div>
        </div>
      </div>
        <!-- ============================================================== -->
        <!-- All SCRIPTS ANS JS LINKS IN BELOW FILE -->
        <!-- ============================================================== -->
         @include('layouts/physician-dashboard/front.scripts')
        @yield('js')
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">

<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    if($('#mytable').length > 0)
        $('#mytable').DataTable();
} );
</script>

<script type="text/javascript">
    $(".show_ecc_popup").click(function(){
        var consultation_id = $(this).attr('data-consultation_id');

        $.ajax({
            url: "{{url('ajax-call_ecc_popup')}}",
            type: "POST",
            cache: false,
            dataType : 'json',
            data:{
                _token:'{{ csrf_token() }}',
                consultation_id : consultation_id,
            },
            success: function(dataResult){
                if(dataResult.status) {
                    $(".modal-body").html(dataResult.html);
                    $("#ecc_modal").modal();
                }
            }
        });
    });
</script>

	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61c43a0fc82c976b71c2c414/1fnj85jin';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

    </body>
</html>