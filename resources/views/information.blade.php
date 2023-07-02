<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My information</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    *{
        font-family:inter;
        box-sizing:border-box
    }
    .image img{
        width:30%;
    
    }
    h1{
        color:blue;
        
    }
    .navbar{
        background-color:black;
        position:fixed;
        bottom:0px;
        width:100%;
        height:10%;

    }
    </style>
</head>
<body class="antialiased">

  <!-- This is to display the success login message  and error messages-->
@if(session('success'))
    <div id="successMessage" class="alert text-primary fs-5 text-center ">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
<div class="alert text-warning fs-5 text-center" id="errorMessage">
    {{session('error')}}
</div>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
       const successMessage = document.getElementById('successMessage');
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 3500);
    });
    document.addEventListener("DOMContentLoaded",function(){
        const errorMessage=document.getElementById("errorMessage");
        setTimeout(() => {
            errorMessage.style.display='none';
        }, 5000);
    })
</script>

<h1 class="text-center fixed-top ">Friends'Information</h1>
<div class="container-fluid">
    <div class="row border justify-content-center">
    @foreach($data as $users)
    <div class="border mt-2 row">
        <div class="col-6">
            
            <p>Firstname: {{ $users->firstname }}</p>
            <p>Lastname: {{ $users->lastname }}</p>
            <p>Email: {{ $users->email }}</p>
            <p>Phone: {{ $users->phone }}</p>
        </div>
        <div class="col-6 image">
            <img src="{{ $users->image_url }}" alt="My profile">
        </div>
</div>
        @endforeach
    </div>
</div>
<div class="navbar">

<button id="updateButton" class="btn bg-primary border" type="submit">Update</button>
<button id="logOutButton" class="btn bg-primary border" type="button">Logout</button>
            <button id="deleteButton" class="btn bg-primary border"  type="submit">Delete</button>
</div>
    <script>
//this is to update information
    document.getElementById("updateButton").addEventListener('click',function(event){
        event.preventDefault();
        window.location.href="/update";
    })
    //this is to signout
    document.getElementById("deleteButton").addEventListener('click',function(event){

        if (confirm('Are you sure you want to delete your data?')) {
            // Send the request to the backend api
            fetch('/delete', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                  
    
                  window.location.href='/signup'
                } else {
                    // Handle error case
                    alert('Failed to delete user data.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting user data.');
            });
        }
    })   
    //this is to logout
    document.getElementById("logOutButton").addEventListener('click',function(){
        if(confirm("Are you ready to logout of the system?")){
            window.location.href='/';
        }
    })
    
    </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
