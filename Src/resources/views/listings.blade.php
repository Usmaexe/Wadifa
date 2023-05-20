@extends('layout')

@section ('page_title')
    Listings
@endsection

@section('content')

@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@if( count($listings)!=0 )
    @foreach($listings as $listing)
        {{-- listing-card is a componenet --}}
        <x-listing-card :listing="$listing" />
    @endforeach
@else
    <h4>No Listings Found</h4>
@endif
</div>
@endsection

