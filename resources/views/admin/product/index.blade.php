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
                <h1>Products</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Products</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>



      <div class="container">
            <div class="row">
                <div class="col-md-12 text-right mb-3">
                    <a href="{{url('product/add')}}" class="btn btn-primary">ADD</a>
                </div>
                @if(Session::has('msg'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                </div>
             @endif

             @if(Session::has('errorMsg'))
             <div class="col-md-12">
                 <div class="alert alert-danger">{{Session::get('errorMsg')}}</div>
             </div>
          @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h5>Products | List</h5> </div>
                        <div class="card-body">
                            <table class="table">
                            <thead class="thead-white">
                            <tr class="text-center">
                                <th>id</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th colspan="2">Operations</th>
                             </tr>
                            </thead>
                            @if($product)
                            @foreach ($product as  $key=>$products)

                            <tr class="text-center">
                            <td>{{++$key}}</td>
                            <td><img style="
                                height: 60px;
                            " src="{{url('/image/'. $products->image)}}" alt=""></td>
                            <td>{{$products->category_name}}</td>
                            <td>{{$products->product_name}}</td>
                            <td>{{$products->price}}</td>
                             @if($products->status=='1')
                             <td>Active</td>
                             @else
                             <td>Inactive</td>
                             @endif
                            <td><a href="{{url('product/edit/'.$products->product_id)}}" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteProduct({{$products->product_id}})" class="btn btn-danger">Delete</a>
                            </td>

                           </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">product not added yet.</td>
                            </tr>
                            @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              <!-- /.col -->
            </div>
    </div>


    {{-- <script>
      $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).attr('id');

            $.ajax({
                type: "POST",
                dataType:"json",
                url: "{{url('changeStatus')}}",
                data:  {
                    "_token": "{{ csrf_token() }}",
                    "user_id": user_id,
                    "status":status,
            },
                success: function(data){
                  console.log(data.success)
                }
            });
        })
      })
    </script> --}}



    <script type="text/javascript">
        function deleteProduct(id){
            if(confirm('Are you sure you want to delete?')){
                window.location.href='{{url('product/delete')}}/'+id;
            }
        }

    </script>


    </body>








@include('layout/admin/footer')
