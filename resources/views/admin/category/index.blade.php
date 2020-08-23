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
                  <li class="breadcrumb-item active">Category</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>



      <div class="container">
            <div class="row">
                <div class="col-md-12 text-right mb-3">
                    <a href="{{url('category/add')}}" class="btn btn-primary">ADD</a>
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
                        <div class="card-header"><h5>Category | List</h5> </div>
                        <div class="card-body">
                            <table class="table">
                            <thead class="thead-white">
                            <tr class="text-center">
                                <th>Cate. Id</th>
                                <th>Cate. Name</th>
                                <th>Status</th>
                                <th colspan="2">Operator</th>
                             </tr>
                            </thead>
                            @if($category)
                            @foreach ($category as $key=>$categories)

                            <tr class="text-center">

                            <td>{{++$key}}</td>
                            <td>{{$categories->name}}</td>
                            @if($categories->status=='1')
                             <td>Active</td>
                             @else
                             <td>Inactive</td>
                             @endif
                            <td><a href="{{url('categoryedit/'.$categories->id)}}" class="btn btn-primary">Edit</a></td>
                            <td><a href="#" onclick="deleteCategory({{$categories->id}})" class="btn btn-danger">Delete</a></td>
                           </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">Category not added yet.</td>
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
        function deleteCategory(id){
            if(confirm('Are you sure you want to delete?')){
                window.location.href='{{url('category/delete')}}/'+id;
            }
        }

    </script>

    </body>



@include('layout/admin/footer')
