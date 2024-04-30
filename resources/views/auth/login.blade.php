<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login </title>
    <link href="{{ URL::asset('assets/css/login.css') }}" rel="stylesheet">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="{{URL::asset('assets/images/log.png')}}" alt="">
        <div class="text">
          <span class="text-1">MAHA-TECH </span>
          <span class="text-2">Connecter Vous <br>Votre programme de gestion des projets</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="{{URL::asset('assets/images/log.png')}}" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="{{ route('login') }}" method="POST" >
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              
              <div class="button input-box">
                <input type="submit" value="Login">
              </div>
            </div>
          </form>
          </div>
        </div>
    </div>
  </div>
</body>
</html>
