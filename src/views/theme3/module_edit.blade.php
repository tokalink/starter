@extends('AdminLayout::layout')

@section('content')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{$action}}" method="post" enctype="multipart/form-data">
        <div class="card-body">
            @csrf
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="slug">Url / Slug</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{url(config('tokalink.admin_prefix'))}}/</span>
                        </div>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Url / Slug" value="{{$module ? $module->slug : ''}}">
                    </div>
                </div>
            </div>

            <!-- Pilih Table -->
            <div class="col-sm-12">
            <div class="form-group">
                    <label for="slug">Table</label>
                    <select class="form-control" name="table" id="table">
                        <option value="">Pilih Table</option>
                        @foreach($tables as $table)
                            <option value="{{$table}}" {{$module && $module->table == $table ? 'selected' : ''}}>{{$table}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()


    })
</script>
@endsection