@extends('layouts.frontend')

@section('title', $title ?? 'Default Title')

@section('content')
   @include('frontend.home.hero')
   @include('frontend.home.how')
   @include('frontend.home.marquee')
   @include('frontend.home.about')
   @include('frontend.home.testimonials')
   @include('frontend.home.blogs')
   @include('frontend.home.faqs')
@endsection