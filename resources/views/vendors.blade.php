<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Vendors</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Main Menu</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-10 me-30 me-lg-50">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                    <!----      <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>  -->

                          <!---------------------------------------------------------->

                                    <!------------------------------------------>
                                    <div class="sb-sidenav-menu-heading">Interfaces</div>
                                    <a class="nav-link" href="/showAdminUsers">
                                        <div class="sb-nav-link-icon"><i class="bi-people"></i></div>
                                        Users
                                    </a>
                                    <a class="nav-link" href="/showAdminvendors">
                                        <div class="sb-nav-link-icon"><i class="bi-people"></i></div>
                                        Vendors
                                    </a>
                                    <a class="nav-link" href="/showAdminHalls">
                                        <div class="sb-nav-link-icon"><i class="bi-people"></i></div>
                                        Halls
                                    </a>
                                    <a class="nav-link" href="/showpost">
                                        <div class="sb-nav-link-icon"><i class="bi-file-post-fill"></i></div>
                                        View Posts
                                    </a>
                                    <a class="nav-link" href="/showreport">
                                        <div class="sb-nav-link-icon"><i class="bi-exclamation-circle"></i></div>
                                        Reporting Review User
                                    </a>


                                    <a class="nav-link" href="/showreportHall">
                                        <div class="sb-nav-link-icon"><i class="bi-exclamation-circle"></i></div>
                                        Reporting Review Hall
                                    </a>

                                    <a class="nav-link" href="/showreportVendor">
                                        <div class="sb-nav-link-icon"><i class="bi-exclamation-circle"></i></div>
                                        Reporting Review Vendor
                                    </a>
                                    <a class="nav-link" href="/showcopon">
                                        <div class="sb-nav-link-icon"><i class="bi-upc-scan"></i></div>
                                        Discount Code
                                    </a>
                                    <a class="nav-link" href="/showpublicities">
                                        <div class="sb-nav-link-icon"><i class="bi-badge-ad"></i></div>
                                        Add Ad
                                    </a>
                                </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <!------>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Vendors</h1>
                        <br>
                        <div class="card mb-4">
                            <div class="card-body">
                                This interface displays all service providers in the system, as it displays the account of each service provider with its information in detail so that the admin can view them.
                            </div>
                        </div>


                    </div>

                    <div class="container">
                        <div class="row bootstrap snippets bootdeys">
                            <div class="col-md-9 col-sm-7">
                                <h2>Members</h2>
                            </div>
                            <div class="col-md-3 col-sm-5">
                                {{-- <form method="get" role="form" class="search-form-full"> --}}
                                    <form action="/vendors" method="POST"  class="search-form-full">
                                        @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                                        <button type="submit" class="btn btn-primary mt-2"> Search</button>
                                        <i class="entypo-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if( session('status'))
                        <div class="alert alert-info">
                            {{ session('status')}}
                        </div>
                    @endif
                        @foreach ($vendors as $vendor)
                        <div class="member-entry">
                           <a href="#" class="member-img">
                                <img src="{{asset('storage/UserPhoto/VendorProfile/'.$vendor->profile_thumbnail )}}" class="img-rounded">

                            </a>
                            <div class="member-details">
                                <h4> Name : {{ $vendor->name }} </h4>
                                <div class="row info-list">
                                    <div class="col-sm-4">
                                       Type :{{ $vendor->type }}
                                    </div>

                                    <div class="col-sm-4">

                                        Gendre :{{ $vendor->gendre }}
                                    </div>

                                    <div class="col-sm-4">
                                        About : {{ $vendor->about }}


                                    </div>
                                    <div class="col-sm-4">
                                        City :{{ $vendor->city }}
                                    </div>
                                    <div class="col-sm-4">
                                        Phone_Number :{{ $vendor->phone_number }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                </main>
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; Your Website 2022</div>
        <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div>
    </div>
</div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
