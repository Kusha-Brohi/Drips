<!-- Js Files Start --> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="https://gromo.github.io/jquery.scrollbar/jquery.scrollbar.js "></script> 

<script src="{{asset('patient-dashboard/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('patient-dashboard/fb/jquery.fancybox.min.js')}}"></script>
 
<script src="{{asset('patient-dashboard/js/custom.js')}}"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> 
<script src="{{asset('patient-dashboard/js/jquery.mixitup.min.js')}}"></script> 
<script src="{{asset('js/jquery.mixitup.min.js')}}"></script> 
<script>new WOW().init();</script>

<!-- Notification JS Below  -->

  <script src="{{ asset('/plugins/vendors/toast-master/js/jquery.toast.js') }}"></script>

  <script>

       $(document).ready(function () {

             @if(\Session::has('message')) 
                  $.toast({
                      heading: 'Success!',
                      position: 'bottom-right',
                      text:  '{{session()->get('message')}}',
                      loaderBg: '#ff6849',
                      icon: 'success',
                      hideAfter: 3000,
                      stack: 6
                  });
              @endif
              
              
              @if(\Session::has('flash_message')) 
                  $.toast({
                      heading: 'Error!',
                      position: 'bottom-right',
                      text:  '{{session()->get('flash_message')}}',
                      loaderBg: '#ff6849',
                      icon: 'error',
                      hideAfter: 3000,
                      stack: 6
                  });
              @endif

              
          })
      
  </script>