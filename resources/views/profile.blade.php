<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
</head>
<body>
    
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 18rem; position: relative;">
            <img src="https://images.freeimages.com/365/images/previews/b0c/icon-pattern-backgrounds-53906.jpg" class="bg" alt="Background Photo">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="pp" alt="Profile Photo">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center mt-2"><?= $nama ?></h5>
                <h5 class="card-title d-flex justify-content-center mt-3">{{ $kelas ?? 'Kelas tidak ditemukan' }}</h5>
                <h5 class="card-title d-flex justify-content-center mt-3"><?= $npm ?></h5>
                <a href="#" class="btn btn-primary card-link d-flex justify-content-center mt-5">Edit Profil</a>
            </div>
        </div>
    </div>
</body>
</html>