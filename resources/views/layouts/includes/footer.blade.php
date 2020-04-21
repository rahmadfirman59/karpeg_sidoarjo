<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
{{--<script src="{{ url('public/assets/js/script.js')  }}"></script>--}}
<script src="{{ url('public/assets/assets/sweetalert/sweetalert.min.js')  }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="assets/demo/chart-area-demo.js"></script>--}}
{{--<script src="assets/demo/chart-bar-demo.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="assets/demo/datatables-demo.js"></script>--}}

@yield('addJS')

<script type="text/javascript">
    $(document).ready(function(){
        $(".readonly").on('keydown paste', function(e){
            e.preventDefault();
        });
        $(function () {
            @if(\Illuminate\Support\Facades\Session::has('message'))
            swal({
                icon: '{{ \Illuminate\Support\Facades\Session::get('message_type') }}',
                text: '{{ \Illuminate\Support\Facades\Session::get('message') }}',
                title: '{{ \Illuminate\Support\Facades\Session::get('message_title') }}',
                button: false,
                timer: 1900
            });
            @endif
        });
    });
</script>