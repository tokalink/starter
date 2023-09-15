@extends('AdminLayout::layouts')

@section('content')
<div class="row">
    <!-- Invoice table -->
    <div class="col-12">
        <div class="card">
            <div class="table-responsive card-datatable">
                <table class="table border-top {{$init->datatable ? 'datatable' : ''}}">
                    <thead>
                        <tr>
                            <th></th>
                            @foreach($cols as $key => $value)
                                <th>{{$value['label']}}</th>
                            @endforeach
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            if(isset(request()->page)){
                                $no = (request()->page - 1) * $init->paginate + $no;
                            }
                        ?>
                        @foreach($data as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            @foreach($cols as $col)
                                <?php
                                    $col_name = $col['name'];
                                ?>
                                <td>{{$row->$col_name}}</td>
                            @endforeach
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="dropdown-caret"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{url('admin/'.$table.'/'.$row->id.'/edit')}}"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="{{url('admin/'.$table.'/'.$row->id)}}"><i class="far fa-eye"></i> Detail</a>
                                        <a class="dropdown-item" href="{{url('admin/'.$table.'/'.$row->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(!$init->datatable)
                <div class="card-footer">
                    {{$data->links()}}
                </div>
                @endif

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