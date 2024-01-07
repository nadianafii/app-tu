@section('content')

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    <head>
        <title>Uji Kelayakan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Font -->
        <link href="https://fonts.cdnfonts.com/css/roboto" rel="stylesheet">

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        
        <div class="column d-flex justify-content-center">
            <div class= "login-container">
                @if (Session::get('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                @endif
                @if (Session::get('logout'))
                    <div class="alert alert-danger">{{ Session::get('logout') }}</div>
                @endif
                @if (Session::get('canAccess'))
                    <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
                @endif
                <p> Login </p>
                <form action="{{ route('login.auth') }}" method="POST">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukan email Anda...">
                    @error('email')
                    <small class="text-danger">{{ $massage }}</small>
                    @enderror
                    </div>
                
                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukan password Anda...">
                    @error('password')
                    <small class="text-danger">{{ $massage }}</small>
                    @enderror
                    </div> 
                
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>
                
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
            </div>
        </div>
    
    </body>

</html>