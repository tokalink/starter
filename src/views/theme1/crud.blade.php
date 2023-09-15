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
            @foreach($form as $f)
            <!-- jika tipe file -->
                @if($f['type'] == 'file')
                <div class="form-group">
                    <label for="{{$f['name']}}">{{$f['label']}}</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="{{$f['name']}}" name="{{$f['name']}}" {{$f['required'] ? 'required' : ''}}>
                            <label class="custom-file-label" for="{{$f['name']}}"></label>
                        </div>
                    </div>
                </div>
                @continue
                @endif

                <!-- htmleditor maka summernote textarea-->
                @if($f['type'] == 'htmleditor')
                <div class="form-group">
                    <label for="{{$f['name']}}">{{$f['label']}}</label>
                    <textarea id="{{$f['name']}}" rows="10" class="summernote" name="{{$f['name']}}" placeholder="{{$f['placeholder']}}" {{$f['required'] ? 'required' : ''}}>
                        {{$data ? $data->{$f['name']} : ''}}
                    </textarea>
                </div>
                @continue
                @endif


                <div class="form-group">
                    <label for="exampleInputEmail1">{{$f['label']}}</label>
                    <input type="{{$f['type']}}" class="form-control" id="{{$f['name']}}" name="{{$f['name']}}" placeholder="{{$f['placeholder']}}" {{$f['required'] ? 'required' : ''}} value="{{$data ? $data->{$f['name']} : ''}}">
                </div>
            @endforeach
            
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
  $(function () {
    // Summernote
    $('.summernote').summernote()
  })
</script>
@endsectiond