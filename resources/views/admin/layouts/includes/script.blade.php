<!-- jQuery -->
<script src="{{asset('admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin-lte/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('.delete-object').on('submit', function (e) {
            //create a random string
            let r = (Math.random() + 1).toString(36).substring(7).toUpperCase();
            //let user confirm exactly this string
            let c = prompt('Type in this letters (case insensitive) to delete: ' + r);
            if (c == null) {
                return false;
            }
            if (c.toUpperCase() != r) {
                alert('Please do it again!');
                return false;
            }
            return true;
        });
    });
</script>
