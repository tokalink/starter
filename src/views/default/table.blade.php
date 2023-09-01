@extends('AdminLayout::layouts.app')

@section('content')
<div class="row">
    <!-- Invoice table -->
    <div class="col-12">
        <div class="card">
            <div class="table-responsive card-datatable">
                <table class="table datatable-admin border-top">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th><i class="ti ti-trending-up text-secondary"></i></th>
                            <th>Total</th>
                            <th>Issued Date</th>
                            <th>Invoice Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- /Invoice table -->
</div>

@endsection

@section('js')
<script>
    $(function() {
        $('.datatable-admin').DataTable({
            processing: true,
            serverSide: true,
            ajax: window.location.href+'/ajax',
            
        });
    });
</script>
@endsection