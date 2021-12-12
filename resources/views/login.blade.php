<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login1.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="assets/img/img-login.svg">
		</div>
		<div class="login-content">
			<form action="{{url('proses_login')}}" method="POST" id="logForm">
                {{ csrf_field() }}
				<img src="assets/img/avatar.svg">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
				<h2 class="title">Welcome</h2>
                @error('login_gagal')
                {{-- <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> --}}
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                    <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		    </div>
                       @if($errors->has('username'))
                        <span class="error">{{ $errors->first('username') }}</span>
                        @endif
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
                @if($errors->has('password'))
                        span class="error">{{ $errors->first('password') }}</span>
                     @endif
            	<input type="submit" class="btn" value="Login">
                <a href="/">Kembali</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/login1.js"></script>
</body>
</html>