<!DOCTYPE html>

<form method="POST" action="crypto">
@csrf
 <input type="text" class="search-text form-control form-control-lg" name="coin1" placeholder="First token"/>

 <input type="text" class="search-text form-control form-control-lg" name="coin2" placeholder="Second token"/>

 <button type="submit">Search</button>
</form>

@if ($_SERVER['REQUEST_METHOD'] === 'POST')

<h1>{{ $coin1 }}/{{ $coin2 }}:</h1>
<p>The price of {{ $coin1 }} is {{ $price }} {{ $coin2 }}</p>
<p>The volume of {{ $coin1 }} is {{ $volume }} {{ $coin2 }}</p>


@endif
