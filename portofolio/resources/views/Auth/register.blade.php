<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- aos(animasi on scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hoverbutton-inline:hover {
            background-color: blue;
            color: white;
        }
    </style>


    <!-- title web -->
    <title>Welcome</title>
</head>
<div class="container mb-5">
    <div class="row">
        <div class="col-xl-7 my-auto mx-auto" >
            <img src="{{ asset('Gambar/admin.png') }}" class="img-fluid w-100" alt="">
        </div>
        <div class="col-xl-5 d-flex flex-column align-items-center justify-content-center my-auto mx-auto">
            <div class="col-11">
                <h5>Login dulu yuk</h5>
                <p class="opacity-50" style="line-height: 1.8; font-size:12px;">Ada informasi baru apalagi nih buat mas Risky</p>
                <form action="{{route('action.register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="font-size:10px">Masukkan email yang biasa</label>
                        <input type="email" name="email" class="form-control border-2 border-top-0 border-start-0 border-end-0 rounded-0 w-100" id="exampleInputEmail1" aria-describedby="emailHelp" style="font-size:10px;">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="font-size:10px">Kuncinya jangan lupa</label>
                        <input type="password" name="password" class="form-control border-2 border-top-0 border-start-0 border-end-0 rounded-0 w-100" id="exampleInputPassword1" style="font-size:10px;">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

