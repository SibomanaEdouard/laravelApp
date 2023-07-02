<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My information</title>
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
        margin-top:5%;
     padding:10%;   
    }
    .update{
        background-color:#A0BDFF;
    }
    h1{
        color:#A0BDFF;
    }
    </style>
</head>
<body class="antialiased">
<h1 class="text-center fixed-top fs-2"> Update My Information</h1>
<!-- <div class="container border formdes w-75 "> -->
<div class="container  border   bg-white cont1 ">
    <form action="/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6">
        <label for="firstname">FirstName</label><br>
        <input type="text" name="firstname" id="firstname" required value="{{ $user->firstname }}"/><br>
        <label for="lastname">LastName</label><br>
        <input type="text" name="lastname" id="lastname" required value="{{ $user->lastname }}"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required value="{{ $user->email }}"><br>
</div>
<div class="col-md-6">
        <label for="phone">Phone</label><br>
        <input type="tel" name="phone" id="phone" required value="{{ $user->phone }}"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br>
        <label for="work">Work</label><br>
        <input type="text" name="work" id="work" required value="{{$user->work}}"><br>
        <label for="image" class="custom-file-upload mt-1">Add photo</label><br>
        <input type="file" name="image" id="image" required value="{{ $user->image_url }}"><br>
</div>

        <button type="submit" class=" w-25 mt-3 update">Update</button>
</div>
    </form>
</div>
<!-- </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
