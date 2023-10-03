@extends('AdminLayout::layout')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>{{ $init->title ?? '' }}</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            @if ($init->button_filter)
                                <li>
                                    <a class="btn btn-filters w-auto popup-toggle"><span class="me-2"><i
                                                class="fe fe-filter"></i></span>Filter </a>
                                </li>
                            @endif
                            @if ($init->button_export)
                                <li>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="btn-filters" data-bs-toggle="dropdown"
                                            aria-expanded="false"><span><i class="fe fe-download"></i></span></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="d-block">
                                                <li>
                                                    <a class="d-flex align-items-center download-item"
                                                        href="javascript:void(0);" download><i
                                                            class="far fa-file-pdf me-2"></i>PDF</a>
                                                </li>
                                                <li>
                                                    <a class="d-flex align-items-center download-item"
                                                        href="javascript:void(0);" download><i
                                                            class="far fa-file-text me-2"></i>CSV</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @if ($init->button_print)
                                <li>
                                    <a class="btn-filters" href="javascript:void(0);"><span><i
                                                class="fe fe-printer"></i></span>
                                    </a>
                                </li>
                            @endif
                            @if ($init->button_import)
                                <li>
                                    <a class="btn btn-import" href="javascript:void(0);"><span><i
                                                class="fe fe-check-square me-2"></i>Import</span></a>
                                </li>
                            @endif
                            @if ($init->button_add)
                                <li>
                                    <a class="btn btn-primary"
                                        href="/{{ config('tokalink.admin_prefix') }}/{{ $menu }}/add"><i
                                            class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div id="filter_inputs" class="card filter-card">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Search Filter -->
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
