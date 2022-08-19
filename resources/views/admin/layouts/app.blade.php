<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body onload="startTime()">
    {{-- <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div> --}}
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
      @include('admin.includes.header')
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
          @include('admin.includes.sidebar')
            <!-- Page Sidebar Ends-->
            @yield('section')
            <!-- footer start-->
       
        </div>
    </div>
@include('admin.includes.footer')
<script>
    $(document).ready(function(){

  
    })
</script>
    <!-- login js-->
    <!-- Plugin used-->
</body>


</html>
