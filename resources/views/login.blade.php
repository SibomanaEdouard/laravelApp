<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        *{
            font-family:inter;
        box-sizing:border-box;
        font-size:20px;
        }
        .submit{
            display:inline;
        }
        h1{
            color:#A0BDFF;
            font-size:25px;
        }
        button{
            background-color:#A0BDFF;
        }
    </style>
</head>
<body class="antialiased">
@if(session('error'))
    <div class="alert text-warning  text-center fs-4 ">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert text-success  text-center fs-4 " id="successMessage">
        {{ session('success') }}
    </div>
@endif

        <h1 class="text-center mt-4">Login in public system</h1>
  <!-- <div class="container-fluid border  w-50 mt-5 row"> -->
    
    <div class='text-center p-5 bg-white col-md-12'>

        <form action="/login" method="post">
       @csrf
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br>
       
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br>
        <button type="submit" class="mt-5 text-primary">Login</button>
    </form>
    <h1 class='submit'>Do you have an account?   </h1>
        <button id="signButton" class="submit border-0" type="submit">sign up</button>
     
</div>

     
       <script>
        document.getElementById("signButton").addEventListener('click',function(event){
            event.preventDefault();
            window.location.href='/signup';
        })
        document.addEventListener('DOMContentLoaded',function(){
            const successMessage=document.getElementById("successMessage");
            setTimeout(() => {
              successMessage.style.display='none';  
            }, 5000);
        })
        
       </script>

       <!-- This is the js about js link about the bootstrap -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
