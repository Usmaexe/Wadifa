<h1 style="color:coral;display:flex;justify-content:center">{{$heading}}</h1>


@if( count($listings)!=0 )
    @foreach($listings as $listing)
            <h3><a href="/listings/{{$listing['id']}}"> {{$listing['title']}} </a></h3>
    @endforeach
@else
    <h4>No Listings Found</h4>
@endif



