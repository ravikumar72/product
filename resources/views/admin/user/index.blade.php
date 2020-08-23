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
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Status</th>
                  </tr>
                  </thead>

                  @foreach ($user as $user)

                  <tr class="text-center">
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at}}</td>
                  <td>{{$user->updated_at}}</td>
                   <td><input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                   </td>
                  </tr>
                  @endforeach

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


<script>
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
</script>

</body>
</html>
@include('layout/admin/footer')

