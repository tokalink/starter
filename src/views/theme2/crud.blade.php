@extends('AdminLayout::layout')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>{{ $init->title }}</h5>
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
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ $title_form }}
                    </h5>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ $action }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @foreach ($form as $f)
                            <!-- jika tipe file -->
                            @if ($f['type'] == 'file')
                                <div class="form-group">
                                    <label for="{{ $f['name'] }}">{{ $f['label'] }}</label>
                                    {{-- jika file ada --}}
                                    @if ($data && $data->{$f['name']})
                                        {{-- jika file maka tampilkan image --}}
                                        @if (isset($f['accept']) && in_array($f['accept'], ['image/jpeg', 'image/png', 'image/jpg', 'image/*']))
                                            <div class="mt-2">
                                                <img src="/{{ $data->{$f['name']} }}" alt="" width="200px">
                                            </div>
                                        @else
                                            {{-- link download file --}}
                                            <a href="{{ $data->{$f['name']} }}" target="_blank"
                                                class="link"><i class="fa-solid fa-download"></i>
                                                Download</a>
                                        @endif
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="{{ $f['accept'] ?? '' }}" class="custom-file-input form-control" id="{{ $f['name'] }}"
                                                    name="{{ $f['name'] }}">
                                                <label class="custom-file-label" for="{{ $f['name'] }}"></label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="{{ $f['accept'] ?? '' }}" class="custom-file-input form-control" id="{{ $f['name'] }}"
                                                    name="{{ $f['name'] }}" {{ $f['required'] ? 'required' : '' }}>
                                                <label class="custom-file-label" for="{{ $f['name'] }}"></label>
                                            </div>
                                        </div>
                                    @endif
                                    
                                </div>
                                @continue
                            @endif

                            <!-- htmleditor maka summernote textarea-->
                            @if ($f['type'] == 'htmleditor')
                                <div class="form-group">
                                    <label for="{{ $f['name'] }}">{{ $f['label'] }}</label>
                                    <textarea id="{{ $f['name'] }}" rows="10" class="htmleditor" name="{{ $f['name'] }}"
                                        placeholder="{{ $f['placeholder'] }}" {{ $f['required'] ? 'required' : '' }}>
                                        {{ $data ? $data->{$f['name']} : '' }}
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

                            @if ($f['type']=='textarea')
                                <div class="form-group">
                                    <label for="{{ $f['name'] }}">{{ $f['label'] }}</label>
                                    <textarea id="{{ $f['name'] }}" rows="10" class="form-control" name="{{ $f['name'] }}" 
                                    placeholder="{{ $f['placeholder'] }}" {{ $f['required'] ? 'required' : '' }}>{{ $data ? $data->{$f['name']} : '' }}</textarea>
                                </div>
                                @continue
                            @endif

                            <div class="form-group">
                                <label for="{{ $f['name'] }}">{{ $f['label'] }}</label>
                                <input type="{{ $f['type'] }}" class="form-control" id="{{ $f['name'] }}"
                                    name="{{ $f['name'] }}" placeholder="{{ $f['placeholder'] }}"
                                    {{ $f['required'] ? 'required' : '' }} value="{{ $data ? $data->{$f['name']} : '' }}">
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-check"></i>
                            Submit</button>
                        <a class="btn btn-warning text-white"
                            href="/{{ config('tokalink.admin_prefix') }}/{{ $menu }}"><i
                                class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://apidaerah.danpro.my.id/daerah.js"></script>
<script>
    $(function() {
        // Summernote
        // $('.summernote').summernote()
        
    })
    CKEDITOR.replaceClass = 'htmleditor';
    let pages = '{{$title_form}}';
    pages = pages.search('Detail');
    if(pages != -1){
        $('input').attr('disabled', true);
        $('textarea').attr('disabled', true);
        $('select').attr('disabled', true);
        $('button[type=submit]').hide();
    }
</script>
@endsection
