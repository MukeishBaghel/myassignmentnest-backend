@extends('super-admin.layout')
@section('head')
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Page</h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                      <label>Hero Title</label>
                      <input type="text" class="form-control" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                      <label>Hero Sub Title</label>
                      <input type="text" class="form-control" placeholder="Enter ...">
                  </div>
                  <hr/>
                  <div class="form-group">
                    <label>Section 1 Title 1</label>
                    <input type="text" class="form-control" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label>Section 1 Content 1</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                   <div class="form-group">
                    <label>Section 1 Title 2</label>
                    <input type="text" class="form-control" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label>Section 1 Content 2</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <hr/>
                  <div class="form-group">
                    <label>Conference Pricing Text</label>
                    <textarea class="form-control" id="summernote">
                      Place <em>some</em> <u>text</u> <strong>here</strong>
                    </textarea>
                  </div>
                  <hr/>
                  <div class="form-group">
                    <label>Sponsor section Text</label>
                    <textarea class="form-control" id="summernote2">
                      Place <em>some</em> <u>text</u> <strong>here</strong>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection

@section('js')
  <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
   <script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
    $('#summernote2').summernote()
  })
</script>
@endsection