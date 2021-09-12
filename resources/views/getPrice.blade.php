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
<div class="container-fluid">
    <div class="row">
            <form action="crypto" method="post" class="box search-form">
			@csrf
                <div class="col-">
                    <h1>Crypto</h1>
                    <p class="text-muted"> Search your trading pair here</p>
                    @auth 
                    <p>Hello user</p>
                    @endauth
                    @guest
                    <p>Hello guest</p>
                    @endguest
                </div>
				<input type="text" name="coin1" placeholder="First token"> 
				<input type="text" name="coin2" placeholder="Second token">
        @if (isset($coin1) && isset($coin2))
        <input type="submit" name="action" value="Favorite">
        @endif  
				<input type="submit" name="action" value="Search">
                </div>
            </form>
    </div>
</div>

@if (isset($coin1) && isset($coin2))
<div class="col">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $coin1 }}/{{ $coin2 }}:</h5>
        <p class="card-text">The price of {{ $coin1 }} is {{ $price }} {{ $coin2 }}</p>
        <p class="card-text">The volume of {{ $coin1 }} is {{ $volume }} {{ $coin2 }}</p>
      </div>
    </div>
  </div>
@endif

    
</body>

