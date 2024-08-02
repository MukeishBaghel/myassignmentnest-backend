@extends('super-admin.layout')
@section('head')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        @include('components.errors')

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('edit-page-post', ['id' => $page_data->id]) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select name="country_id" class="form-control" >
                                            <option value="">please select</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" {{ $country->id == $page_data->country_id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- <select type="text" placeholder="Enter ..."> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control"
                                            value="{{ $page_data->location }}" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Page Url</label>
                                        <input type="text" name="page_url" value="{{ $page_data->page_url }}"
                                            class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Hero Title</label>
                                        <input type="text" name="hero_title" value="{{ $page_data->hero_title }}"
                                            class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Hero Sub Title</label>
                                        <input type="text" name="hero_sub_title" value="{{ $page_data->hero_sub_title }}"
                                            class="form-control" placeholder="Enter ...">
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label>Section 1 Title 1</label>
                                        <input type="text" name="section_1_title_1"
                                            value="{{ $page_data->section_1_title_1 }}" class="form-control"
                                            placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Section 1 Content 1</label>
                                        <textarea class="form-control" name="section_1_content_1" rows="3"
                                            placeholder="Enter ...">{{ $page_data->section_1_content_1 }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Section 1 Title 2</label>
                                        <input type="text" name="section_1_title_2"
                                            value="{{ $page_data->section_1_title_2 }}" class="form-control"
                                            placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Section 1 Content 2</label>
                                        <textarea class="form-control" name="section_1_content_2" rows="3"
                                            placeholder="Enter ...">{{ $page_data->section_1_content_2 }}</textarea>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label>Conference Pricing Text</label>
                                        <textarea class="form-control" name="conference_pricing_text" value="" id="summernote">
                                            @if ($page_data->conference_pricing_text)
                                                {{ $page_data->conference_pricing_text }}
                                            @else
                                                Place <em>some</em> <u>text</u> <strong>here</strong>
                                            @endif                                              
                                        </textarea>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label>Sponsor section Text</label>
                                        <textarea class="form-control" name="sponsor_section_text" id="summernote2">
                                            @if ($page_data->sponsor_section_text)
                                                {{ $page_data->sponsor_section_text }}
                                            @else
                                                Place <em>some</em> <u>text</u> <strong>here</strong>
                                            @endif
                                        </textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
            $('#summernote2').summernote()
        })
    </script>
@endsection
