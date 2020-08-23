@include('layout/admin/left-nav')


    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
          <!-- Navbar -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Category</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Add|Category</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <a href="{{url('category')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Category | Add</h5> </div>
                    <div class="card-body">
                       <form action="{{route('category.save')}}" method="post">
                       @csrf


               <div class="form-group">
                       <lable for="">Category Name</lable>
                       <input type="text" name="name" id="name" value="" class="form-control {{($errors->any() && $errors->first('name')) ? 'is-invalid' : ''}}">
               </div>
               @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('name')}}</p>
                        @endif


                        <div class="form-group">
                            <lable for="">Status</lable>
                            <select class="form-control" name="status">
                              <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>

                            </div>
                            @if($errors->any())
                                 <p class="invalid-feedback">{{$errors->first('status')}}</p>
                             @endif

                       <div class="form-group">
                       <button type="submit" name="submit" class="btn btn-primary">Save Category</button>
                       </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>










@include('layout/admin/footer')
