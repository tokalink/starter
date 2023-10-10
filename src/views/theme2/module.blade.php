@extends('AdminLayout::layout')

@section('content')
<div class="row">
    <!-- Invoice table -->
    <div class="col-12">
        <div class="card">
            <div class="table-responsive card-datatable">
                <table class="table border-top datatable">
                    <thead>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Slug / Url</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->slug}}</td>
                            <td>
                                <a class="dropdown-item" href="{{url('admin/module/edit/'.$row->id)}}"><i class="far fa-edit"></i> Edit</a>
                                <a class="dropdown-item" href="{{url('admin/module/'.$row->id)}}"><i class="far fa-eye"></i> Detail</a>
                                <a class="dropdown-item" href="{{url('admin/module/'.$row->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
        $('.datatable').DataTable({});
    });
</script>
@endsection