@extends('layout.main')
@include('partials.navbar')
@section('content')
   <a href="{{route('/')}}" class="btn btn-secondary">Dashboard</a> 
<!DOCTYPE html>
<html>
<body>
    <nav>
    <a href="{{route('dashboard')}}" class="btn btn-secondary">Dashboard</a>
    <a href="{{route('tentang')}}" class="btn btn-secondary">Tentang</a>
    <a href="{{route('sensor')}}" class="btn btn-secondary">sensor</a>
    <a href="{{route('laporan')}}" class="btn btn-secondary">Laporan</a>
    </nav>
</body>
</html>
@endsection