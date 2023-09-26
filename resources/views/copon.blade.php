<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Copun</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
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
                        <h1 class="mt-4">Copun</h1>
                        <br>
                        <div class="card mb-4">
                            <div class="card-body">
                                This feature allows the admin to create a discount code with different rates for any existing service, and they are good offers that encourage customers.
                            </div>
                        </div>
                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                      @endif
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                                    <div class="d-table-cell align-middle">

                                        <div class="text-center mt-4">
                                            <h1 class="h2">Discount Code</h1>

                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="m-sm-4">
                                                <form action="/copon" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="form-group">
                                                    <label>type</label>
                                                    <input class="form-control form-control-lg" type="text" name="type" placeholder="Enter Code">
                                                </div>

                                                        <div class="form-group">
                                                            <label>Code</label>
                                                            <input class="form-control form-control-lg" type="text" name="code_owner" placeholder="Enter Code">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Period</label>
                                                            <input class="form-control form-control-lg" type="text" name="period_of_copun" placeholder="Enter Period Of Copun">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Datefinish</label>
                                                            <input class="form-control form-control-lg" type="date" name="datefinish" placeholder="Enter Datefinish">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                Ratio</label>
                                                            <input class="form-control form-control-lg" type="text" name="amount" placeholder="Enter Ratio ">
                                                        </div>
                                                        <div class="form-button pt-4" style="margin-right: 70px;">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            <span>Add copun</span></button> </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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
