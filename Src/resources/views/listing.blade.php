<h1 style="color:coral;display:flex;justify-content:center">{{$heading}}</h1>
@if($listing != null)
    <h3>{{$listing['title']}}</h3>
    <h5 class='mt1'>{{$listing['description']}}</h5>
@else
    <h3>Not Job Was Found :(</h3>
@endif


<a href="/listings">Return</a>
