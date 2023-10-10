@extends('AdminLayout::layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive card-datatable">
                <table class="table border-top datatable">
                    <thead class="border-top">
                        <tr>
                            <!-- checkbox -->
                            <th></th>
                            @foreach($cols as $col)
                            <th>{{$col['label']}}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
let button_add = '{{ json_encode($init->button_add) }}'
let button_filter = '{{ json_encode($init->button_filter) }}'


    $.fn.dataTable.ext.errMode = 'none';
    var col = '{!! $columns !!}';
    col = JSON.parse(col);
    col.unshift({
        data: 'id',
        name: 'id',
        orderable: false,
        searchable: false
    });

    var table = $('.datatable').DataTable({
        ajax: window.location.href + '/ajax',
        processing: true,
        serverSide: true,
        pageLength: 20,
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
        language: {
            sLengthMenu: '_MENU_',
            search: '',
            searchPlaceholder: 'Search Items',
            info: 'Displaying _START_ to _END_ of _TOTAL_ entries'
        },
        dom: '<"card-header d-flex border-top rounded-0 flex-wrap py-2"' +
            '<"me-5 ms-n2 pe-5"f>' +
            '<"d-flex justify-content-start justify-content-md-end align-items-baseline"<"dt-action-buttons d-flex flex-column align-items-start align-items-md-center justify-content-sm-center mb-3 mb-md-0 pt-0 gap-4 gap-sm-0 flex-sm-row"lB>>' +
            '>t' +
            '<"row mx-2"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>' +
            '>',
        buttons: [{
                extend: 'collection',
                className: 'btn btn-warning dropdown-toggle me-3',
                text: '<i class="ti ti-download me-1 ti-xs"></i>Export',
                buttons: [{
                        extend: 'print',
                        className: 'dropdown-item',
                        text: '<i class="ti ti-printer me-1 ti-xs"></i>Print',
                    },
                    {
                        extend: 'excel',
                        className: 'dropdown-item',
                        text: '<i class="ti ti-table me-1 ti-xs"></i>Excel'
                    },
                    {
                        extend: 'csv',
                        className: 'dropdown-item',
                        text: '<i class="ti ti-file me-1 ti-xs"></i>Csv',
                    },
                    {
                        extend: 'pdf',
                        className: 'dropdown-item',
                        text: '<i class="ti ti-pdf me-1 ti-xs"></i>Pdf',
                    },
                    {
                        extend: 'copy',
                        className: 'dropdown-item',
                        text: '<i class="ti ti-copy me-1 ti-xs"></i>Copy',
                    }

                ]
            },
            {
                extend: 'collection',
                className: 'btn btn-primary dropdown-toggle me-3',
                text: '<i class="ti me-1 ti-xs"></i>Options Menu',
                buttons: [
                    {
                        text: '<i class="ti ti-plus me-sm-1"></i>Add Item',
                        className: 'dropdown-item',
                        action: function(){
                            window.location.href = `${document.location.href.split('#')[0]}/add`;
                        }
                    },
                ]
            }
        ],
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