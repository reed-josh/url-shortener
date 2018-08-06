@extends('short-url-form')
@section('sub-page')
Short URL: {{ request()->root() . '/' . $shortUrl }}
@endsection