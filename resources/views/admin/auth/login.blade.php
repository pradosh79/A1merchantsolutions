<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - {{ config('company.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-bg{background:url('../images/104.jpg') no-repeat center;background-size:cover;position:relative;}
       .overlay{content:"";background:rgba(0,0,0,0.7); position:absolute; top:0; bottom:0; right:0; left:0;width:100%; height:100%;margin:auto;}
        .custom-bg .container{z-index:99;}
        .custom-card{background:transparent;border:0px;}
        .custom-card label{color:#fff;}
        .custom-card h5{color:#fff;}
        .btn-primary{background:#f47820;border:2px solid #f47820;border-radius:0;}
        .btn-primary:hover{background:#fe5901;border:2px solid #fe5901;}
        .form-check-input:checked{background-color:#f47820;border-color:#f47820;}
        .form-check-input[type=checkbox]{border-radius:0;box-shadow:none;}
        .logoclass img{width:100px;}
        .card-body input[type="email"], .card-body input[type="password"]{background-color:transparent;border:2px solid #fff;border-radius:0px;box-shadow: none !important;outline:0;color:#fff;}
        .card-body input[type="email"]:-webkit-autofill,
        .card-body input[type="password"]:-webkit-autofill,
        .card-body input[type="email"]:-webkit-autofill:hover,
        .card-body input[type="password"]:-webkit-autofill:hover,
        .card-body input[type="email"]:-webkit-autofill:focus,
        .card-body input[type="password"]:-webkit-autofill:focus {
            -webkit-text-fill-color: #fff !important;
            -webkit-box-shadow: 0 0 0 1000px transparent inset !important;
            box-shadow: 0 0 0 1000px transparent inset !important;
            background-color: transparent !important;
            border: 2px solid #fff !important;
            transition: background-color 9999s ease-in-out 0s;
        }
        
        .form-control:focus {
            box-shadow: none !important;
            outline: none !important;
        }
    </style>
</head>
<body class="custom-bg d-flex align-items-center min-vh-100">
    <div class="overlay"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="logoclass text-center mb-3">
                <img src="{{ asset(ltrim(config('company.logo'), '/')) }}" alt="{{ config('company.name') }}">
            </div>
            <div class="card custom-card">
                <div class="text-center" style="border-bottom:0;">
                    <!--<h5 class="mb-0">{{ config('company.name') }} Admin</h5>-->
                    <h5 class="mb-0">Welcome back</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('admin.login.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
