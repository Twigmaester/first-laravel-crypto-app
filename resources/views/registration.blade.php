<!DOCTYPE html>
<head>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Crypto app</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link href="./css/app.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="register" method="post" class="box">
				@csrf
                    <h1>Login</h1>
                    <p class="text-muted"> Choose your username and password.</p> 
					<input type="email" name="email" placeholder="E-mail">
                    <input type="text" name="name" placeholder="Username"> 
					<input type="password" name="password" placeholder="Password">
                    <p class="text-muted"> Do you already have an account?</p>
					<a class="forgot text-muted" href="/login">Login</a> 
					<input type="submit" name="register" value="Register">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

