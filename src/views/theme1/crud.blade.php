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

                {{-- type select --}}
                @if ($f['type'] == 'select')
                    <label for="{{ $f['name'] }}">{{ $f['label'] }}</label>
                    <select id="{{ $f['name'] }}" class="form-control" name="{{ $f['name'] }}">"
                        @if (isset($f['datatable']))
                            @php
                                $options = \DB::table($f['datatable']['table'])->get();
                                if(isset($f['datatable']['where'])){
                                    $options = \DB::table($f['datatable']['table'])->whereRaw($f['datatable']['where'])->get();
                                }
                            @endphp
                            @foreach ($options as $d)
                                <option value="{{ $d->{$f['datatable']['value']} }}">
                                    {{ $d->{$f['datatable']['label']} }}</option>
                            @endforeach
                        @endif
                        @isset($f['dataenum'])
                            @php
                                $options = explode(',', $f['dataenum']);
                            @endphp
                            @foreach ($options as $d)
                                    @php
                                        $op = explode('|', $d);
                                    @endphp
                                    <option value="{{ $op[0] }}"
                                    {{ $data ? ($data->{$f['name']} == $op[0] ? 'selected' : '') : '' }}>
                                    {{ $op[1] ?? $op[0] }}</option>
                            @endforeach
                        @endisset
                    </select>
                    @continue
                @endif

                {{-- type textarea --}}
                @if ($f['type']=='textarea')
                    <div class="form-group">
                        <label for="{{ $f['name'] }}">{{ $f['label'] }}</label>
                        <textarea id="{{ $f['name'] }}" rows="10" class="form-control" name="{{ $f['name'] }}" 
                        placeholder="{{ $f['placeholder'] }}" {{ $f['required'] ? 'required' : '' }}>{{ $data ? $data->{$f['name']} : '' }}</textarea>
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
            <a class="btn btn-warning text-white"
                href="/{{ config('tokalink.admin_prefix') }}/{{ $menu }}">
                <i class="fa-solid fa-arrow-left"></i>
                Back
            </a>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    let pages = '{{ $title_form }}';
    pages = pages.search('Detail');
    if(pages != -1){
        $('input').attr('disabled', true);
        $('textarea').attr('disabled', true);
        $('select').attr('disabled', true);
        $('button[type=submit]').remove();
    }
  $(function () {
    // Summernote
    $('.summernote').summernote()
  })
</script>
@endsection