<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>@yield('title', 'Clinic Patient Records')</title> 
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Our Custom External CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head> 
<body> 

<nav class="navbar navbar-expand-lg navbar-dark">  
    <div class="container"> 
        <a class="navbar-brand" href="{{ route('patients.index') }}"> 
            <i class="bi bi-hospital-fill me-2"></i>Clinic Records 
        </a> 
        <div class="ms-auto d-flex gap-2"> 
            <a href="{{ route('patients.index') }}" class="btn btn-outline-light btn-sm">
                <i class="bi bi-list-ul me-1"></i> Patient List
            </a> 
            <a href="{{ route('patients.create') }}" class="btn btn-light btn-sm text-primary">
                <i class="bi bi-person-plus-fill me-1"></i> Register Patient
            </a> 
        </div> 
    </div> 
</nav> 

<main class="container main-container">
    @if (session('success')) 
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert"> 
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
        </div> 
    @endif 
    
    @if ($errors->any()) 
        <div class="alert alert-danger shadow-sm" role="alert"> 
            <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Please correct the following errors:</strong> 
            <ul class="mb-0 mt-2"> 
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
    @endif 
    
    @yield('content') 
</main> 

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 

</body> 
</html>