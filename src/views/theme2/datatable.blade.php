@extends('AdminLayout::layout')

@section('content')
    <style>
        .limited-width {
            max-width: 100px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
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

            {{-- Jika ada element html tambahan --}}
            @if (isset($init->html[0]))
                @foreach ($init->html as $item)
                    {!! $item !!}
                @endforeach
            @endif
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
                    <div class="card">
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

    {{-- Filter --}}
    <div class="toggle-sidebar">
        <div class="sidebar-layout-filter">
            <div class="sidebar-header">
                <h5>Filter</h5>
                <a href="#" class="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
            </div>
            <div class="sidebar-body">
                <form action="#" autocomplete="off">

                    @if (isset($init->filter_by['created_at']) && $init->filter_by['created_at'])
                        <div class="accordion" id="accordionMain2">
                            <div class="card-header-new" id="created_at">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#created_at" aria-expanded="true" aria-controls="created_at">
                                        {{ $init->filter_by['created_at'] }}
                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                    </a>
                                </h6>
                            </div>

                            <div id="created_at" class="collapse" aria-labelledby="created_at"
                                data-bs-parent="#accordionExample2">
                                <div class="card-body-chat">
                                    <div class="form-group">
                                        <label class="form-control-label">From</label>
                                        <div class="cal-icon">
                                            <input type="email" class="form-control datetimepicker"
                                                placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">To</label>
                                        <div class="cal-icon">
                                            <input type="email" class="form-control datetimepicker"
                                                placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach ($init->filter_by as $filter)
                        <div class="accordion" id="accordionMain2">
                            <div class="card-header-new" id="headingTwo">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        Select Date
                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                    </a>
                                </h6>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample2">
                                <div class="card-body-chat">
                                    <div class="form-group">
                                        <label class="form-control-label">From</label>
                                        <div class="cal-icon">
                                            <input type="email" class="form-control datetimepicker"
                                                placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">To</label>
                                        <div class="cal-icon">
                                            <input type="email" class="form-control datetimepicker"
                                                placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="accordion" id="accordionMain3">
                        <div class="card-header-new" id="headingThree">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="true"
                                    aria-controls="collapseThree">
                                    By Status
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample3">
                            <div class="card-body-chat">
                                <div id="checkBoxes2">
                                    <div class="form-custom">
                                        <input type="text" class="form-control" id="member_search2"
                                            placeholder="Search here">
                                        <span><img src="/assets-admin/theme2/img/icons/search.svg"
                                                alt="img"></span>
                                    </div>
                                    <div class="selectBox-cont">
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="bystatus">
                                            <span class="checkmark"></span> All Invoices
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="bystatus">
                                            <span class="checkmark"></span> Paid
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="bystatus">
                                            <span class="checkmark"></span> Overdue
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="bystatus">
                                            <span class="checkmark"></span> Draft
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="bystatus">
                                            <span class="checkmark"></span> Recurring
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="bystatus">
                                            <span class="checkmark"></span> Cancelled
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <button type="submit"
                        class="d-inline-flex align-items-center justify-content-center btn w-100 btn-primary">
                        <span><img src="/assets-admin/theme2/img/icons/chart.svg" class="me-2"
                                alt="Generate report"></span>Generate report
                    </button>
                </form>

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
        console.log(col)
        // jika ada callback maka ubah data sesuai callback
        col.forEach(function(item, index) {
            // jika ada callback maka ubah data sesuai callback
            if (item.callback) {
                // mRender
                if (item.callback) {
                    col[index].render = function(data, type, row) {
                        data = $('<div/>').html(data).text();
                        return data;
                    }
                }
            }
            if(item.v_align){
                col[index].render = function(data, type, row) {
                    item.className = 'text-' + item.v_align;
                }
            }
        });

        var table = $('.datatable2').DataTable({
            ajax: window.location.href.split("#")[0] + '/ajax',
            processing: true,
            serverSide: true,
            pageLength: {{ $init->paginate ?? 10 }},
            dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>tl<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            lengthMenu: [
                [10, 20, 50, 100, 500, 1000, 2000, 5000, -1],
                [10, 20, 50, 100, 500, 1000, 2000, 5000, 'All']
            ],
            'columnDefs': [{
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
            drawCallback: function() {
                $('.dataTables_filter').addClass('text-end');
                $('.buttons-copy').removeClass('btn-secondary').addClass('btn-warning');
                $('.buttons-csv').removeClass('btn-secondary').addClass('btn-info');
                $('.buttons-excel').removeClass('btn-secondary').addClass('btn-success');
                $('.buttons-pdf').removeClass('btn-secondary').addClass('btn-danger');
                $('.form-select-sm').removeClass('form-select');
            },
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
                        url: window.location.href.split('#')[0] + '/remove/' + id,
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
                            });
                            table.ajax.reload();
                        }
                    });
                }
            });
        }
    </script>
@endsection
