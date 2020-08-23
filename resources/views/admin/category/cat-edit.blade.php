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
                       <form action="{{url('category-update')}}" method="post">
                       @csrf
                       <select class="form-control" name="name">
                        <option value="">Select Product Category</option>
                        @foreach ($category as $item)
                        <option value="{{$item->name}}" <?php if ($item->id== $request->id) echo 'selected' ; ?>>{{$item->name}}</option>

                        @endforeach
                        </select>
                @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('cate_id')}}</p>
                        @endif


 <input type="hidden" name="category_id" value="{{$categories->id}}">
                       <div class="form-group">
                       <lable for="">Status</lable>
                       <select class="form-control" name="status">
                         <option value="">Select Status</option>
                           <option value="1" <?php if ($categories->status== 1) echo 'selected' ; ?>>Active</option>
                           <option value="0" <?php if ($categories->status== 0) echo 'selected' ; ?>>InActive</option>
                       </select>

                       </div>
                       @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('status')}}</p>
                        @endif

                       <div class="form-group">
                       <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                       </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>










@include('layout/admin/footer')
