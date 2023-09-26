<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reporting Review</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Main Menu</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
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
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                          <!---------------------------------------------------------->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    </div>
                                    <!------------------------------------------>
                            <div class="sb-sidenav-menu-heading">Addons</div>
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
                        <h1 class="mt-4">Reporting Review</h1>
                        <ol>
                            Reporting Review
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                An Admin block user or ignore Reporting after read and cheak it.
                            </div>
                        </div>
                    </div>
                    <!----->
                    @foreach ($reports as $report)
                    <div class="container profile">
                        <div class="col-md-20">
                            <div class="panel panel-profile">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-20">
                                        <div class="profile-blog blog-border">
                                            <img class="rounded-x" src="{{asset('storage/UserPhoto/VendorProfile/'.$report->reportUser->profile_thumbnail )}}" alt="">
                                            <div class="name-location">
                                                <strong style="font-size:18px ;margin-top:5%"> UserName: {{ $report->reportUser->name }}</strong>
                                            </div>
                                            <div class="clearfix margin-bottom-20"></div>
                                            <p style="font-size: 17px">Reason for reporting: {{$report->reason}} <hr>
                                            <ul class="list-inline share-list">


                                                <form  method="post" action="/report/{{$report->id}}/{{$report->user_id}}/forbiddin" id="forbiddin{{$report->user_id}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <li>  <button type="submit" class="btn btn-danger" onclick="document.getElementById('forbiddin{{$report->user_id}}').submit(); return false;">Block</button> </li>
                                                </form>

                                                <form  method="post" action="/reportUser/{{$report->id}}/ignorUser" id="ignorUser{{$report->id}}">
                                                    @csrf
                                                    @method("DELETE")
                                                    <li> <button type="submit" class="btn btn-secondary" onclick="document.getElementById('ignorUser{{$report->id}}').submit(); return false;"style="margin-top: 10%">Ignore</button> </li>
                                                </form>


                                               </ul>
                                        </div>
                                    </div>
                                </div>


                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <!---->
                </main>











{{-- <footer class="py-4 bg-light mt-auto">
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
</footer> --}}
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="assets/demo/chart-pie-demo.js"></script>
</body>
</html>
