<!-- jQuery (WAJIB) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables core + Bootstrap 5 integration -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        if ($('#tabelAbsensi').length) {
            $('#tabelAbsensi').DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                columnDefs: [{ orderable: false, targets: 5 }] // kolom Action
            });
        }
    });
</script>