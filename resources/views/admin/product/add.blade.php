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
                    <h1>Product</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Add|Product</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <a href="{{url('products')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Product | Add</h5> </div>
                    <div class="card-body">
                       <form action="{{url('product/save')}}" method="post" enctype="multipart/form-data">
                       @csrf


               <div class="form-group">
                       <lable for="">Product Name</lable>
                       <input type="text" name="name" id="name" value="" class="form-control {{($errors->any() && $errors->first('name')) ? 'is-invalid' : ''}}">
               </div>
               @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('name')}}</p>
                        @endif


               <select class="form-control" name="category_id">
                <option value="">Select Product Category</option>
                @foreach ($category as $item)
               <option value="{{$item->id}}" name="category_id">{{$item->name}}</option>
                @endforeach
                </select>
                @if($errors->any())
                <p class="invalid-feedback">{{$errors->first('category_id')}}</p>
            @endif

            <div class="form-group">
                <label for="image">Post Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            @if($errors->any())
            <p class="invalid-feedback">{{$errors->first('image')}}</p>
        @endif



                     <div class="form-group">
                        <lable for="">Price</lable>
                        <input type="number" name="price" id="price" value="" class="form-control {{($errors->any() && $errors->first('price')) ? 'is-invalid' : ''}}">
                     </div>
                     @if($errors->any())
                     <p class="invalid-feedback">{{$errors->first('price')}}</p>
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
                       <button type="submit" name="submit" class="btn btn-primary">Save Product</button>
                       </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>










@include('layout/admin/footer')
