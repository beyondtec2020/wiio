@include('admin.includes.header')
@include('admin.includes.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- <section class="content-header"><h1>Page Header</h1></section>
    <section class="content"></section> -->
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>{!! $GeneralSetting->footer !!}</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('public/assets/admin/js/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('public/assets/admin/js/bootstrap.min.js')}}"></script>

<script src="{{asset('public/js/sweetalert.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/assets/admin/js/app.min.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('public/assets/js/custom.js')}}"></script>
@include('Alerts::alerts')
<script type="text/javascript">
    $(".alert").delay(4000).slideUp(300, function() {
        $(this).alert('close');
    });

    @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}";
        var message = "{{Session::get('message')}}";
        showMessage(message, type);
    @endif
</script>
@yield('script')
</body>
</html>
