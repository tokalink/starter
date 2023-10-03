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
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="{{ $f['name'] }}"
                                                name="{{ $f['name'] }}" {{ $f['required'] ? 'required' : '' }}>
                                            <label class="custom-file-label" for="{{ $f['name'] }}"></label>
                                        </div>
                                    </div>
                                </div>
                                @continue
                            @endif

                            <!-- htmleditor maka summernote textarea-->
                            @if ($f['type'] == 'htmleditor')
                                <div class="form-group">
                                    <label for="{{ $f['name'] }}">{{ $f['label'] }}</label>
                                    <textarea id="{{ $f['name'] }}" rows="10" class="summernote" name="{{ $f['name'] }}"
                                        placeholder="{{ $f['placeholder'] }}" {{ $f['required'] ? 'required' : '' }}>
                                        {{ $data ? $data->{$f['name']} : '' }}
                                    </textarea>
                                </div>
                                @continue
                            @endif


                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ $f['label'] }}</label>
                                <input type="{{ $f['type'] }}" class="form-control" id="{{ $f['name'] }}"
                                    name="{{ $f['name'] }}" placeholder="{{ $f['placeholder'] }}"
                                    {{ $f['required'] ? 'required' : '' }} value="{{ $data ? $data->{$f['name']} : '' }}">
                            </div>
                        @endforeach

                    </div>
                    <!-- /.card-body -->

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
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()


        })
    </script>
@endsection
