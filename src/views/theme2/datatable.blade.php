@extends('AdminLayout::layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-table">
            <div class="card-body">
                <div class="table-responsive">
                    @include('AdminComponents::datatable')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $.fn.dataTable.ext.errMode = 'none';
    var col = '{!! $columns !!}';
    col = JSON.parse(col);
    col.unshift({
        data: 'id',
        name: 'id',
        orderable: false,
        searchable: false
    });

    var table = $('.datatable2').DataTable({
        ajax: window.location.href + '/ajax',
        processing: true,
        serverSide: true,
        pageLength: 10,
        dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>tl<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        lengthMenu: [
            [10, 20, 50, 100, 500, 1000, 2000, 5000, -1],
            [10, 20, 50, 100, 500, 1000, 2000, 5000, 'All']
        ],
        'columnDefs': [{
            // For Checkboxes
            targets: 0,
            orderable: false,
            checkboxes: {
                selectAllRender: '<input type="checkbox" class="form-check-input">'
            },
            render: function() {
                return '<input type="checkbox" class="dt-checkboxes form-check-input" >';
            },
            searchable: false
        }],
        columns: col,
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            'print'
        ]
    });


    // delete sweetalert2 confirm
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: window.location.href + '/remove/' + id,
                    type: 'GET',
                    success: function(data) {
                        Swal.fire({
                            title: 'Good job!',
                            text: 'success delete data',
                            icon: 'success',
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        })
                        table.ajax.reload();
                    }
                });
            }
        });
    }
</script>
@endsection