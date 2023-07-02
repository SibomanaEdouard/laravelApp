<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enpeace</title>
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
        input[type='file']{
            display:none;
        }
        .custom-file-upload {
        display: inline-block;
        padding: 5px 10px;
        cursor: pointer;
        background-color: #ccc;
        color: #fff;
        border-radius: 4px;
    
    }
    .cont1{
        margin-top:0%;
     padding:10%; 
     height:100%;
            width:100%; 
    
    }
    button{
        background-color: #A0BDFF;
    }
    .header1{
        color:#A0BDFF;
    }
    .submit{
        display:inline;
    }
    .headerbutton{
        color:#A0BDFF;

    }
    </style>
</head>
<body class="antialiased row">
@if(session('error'))
<div class="alert fs-5 text-warning text-center" id='errorMessage'>
    {{session('error')}}
</div>
@endif

<!-- This is for success  -->
@if(session('success'))
<div class="alert fs-5 text-primary text-center" id='successMessage'>
    {{session('success')}}
</div>
@endif
<!-- Its javascript -->
<script>
    document.addEventListener('DOMContentLoaded',function(){
        const successMessage=document.getElementById('successMessage');
        setTimeout(() => {
            successMessage.style.display='none';
            
         }, 5000);

    })
</script>
 <h1 class="header1 text-center fs-3">Sign up in puplic system<h1>
        <div class=" bg-white cont1 ">
    <form action="{{ url('/users') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6">
        <label for="firstname">FirstName</label><br>
        <input type="text" name="firstname" id="firstname" required placeholder="enter firstname"><br>
        <label for="lastname">LastName</label><br>
        <input type="text" name="lastname" id="lastname" required placeholder="enter lastname"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required placeholder="enter email"><br>
        </div>
        <div class="col-md-6">
        <label for="phone">Phone</label><br>
        <input type="tel" name="phone" id="phone" required placeholder="enter phone number"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required placeholder="enter password"><br>
        <label for="work">work</label><br>
        <input type="tel" name="work" id="work" required placeholder="enter work you do"><br>
        <label for="image" class="custom-file-upload mt-3">Add photo</label><br>
        <input type="file" name="image" id="image" title="choose photo" required><br>
        
</div>
        <button type="submit" class="w-50 m-5  p-2">Sign up</button>
</div>
    </form>
    <h1 class="submit headerbutton fs-3">Do you have an account?</h1> 

        <button id="loginButton" type="submit" class="p-2 border-0  fs-4 submit ">Login</button>
    
    </div>
    <!-- </div> -->
    <script>
        document.getElementById('loginButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevents the default form submission behavior
            window.location.href = '/';
        });
    </script>
    <!-- This is the js about the bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
