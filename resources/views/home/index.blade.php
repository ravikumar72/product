<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <p class="h1">Home</p>
      </div>
      <div class="col-md-6 text-right">
      <div>
      @if (Route::has('login'))
                    @auth
                    <a href="{{url('listcart')}}">My Cart</a>
                    <p class="h2 text-primary">{{ Auth::user()->name }}</p>
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif 
      </div>
      </div>
    </div>

    <div class="row text-center">
        @foreach ($products as  $key=>$products)

      <div class="col-md-3 mb-4">
        <div class="card h-100 pt-3">
          <a href="#"><img style="height: 60px;"src="{{url('/image/'. $products->image)}}" alt=""></a>
          <div class="">
              <a href="#">{{$products->name}}</a>
            </h4>
            <h5>{{$products->price}}/-</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
          </div>
          <div class="pb-2">
            <small class="text-success">&#9733; &#9733; &#9733; &#9733; &#9734;</small> <br>
            @if (Auth::user())
            <a href="{{url('add/cart/'.$products->id)}}" class="btn btn-success">Add To Cart</a>
          
             @else
             <a href="{{url('/login')}}" class="btn btn-success">Add To Cart</a>
      
            @endif

            <a href="#" class="btn btn-primary">View Detail</a>
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </div>

 
</body>
</html>