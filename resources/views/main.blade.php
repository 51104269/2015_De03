@extends('app')

@section('content')
	<!-- Slider -->
    @include('parts.sliders')
    <!-- //end Slider --> 
    
    <!-- Social widgets -->
    @include('parts.social_widgets')
    <!-- //end Social widgets --> 
    
    <!-- Filters -->
    @include('parts.filters')
    <!-- //end Filters --> 
    
    <!-- Products -->
    @include('parts.products')
    <!-- //end Products --> 
@endsection
