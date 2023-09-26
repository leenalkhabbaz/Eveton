<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>View Posts</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Main Menu</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        {{-- <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form> --}}
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
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
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <!---------------------------------------------------------->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
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
                    <h1 class="mt-4">View Posts</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">View Posts</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Displaying user posts that will be used in the application in order for the admin to approve
                            or reject the publication before displaying it in the application.
                        </div>
                    </div>

                </div>

                <!------------------>
                {{-- @if ($postsresult->count() == 0)
                <th style="font-size: 20px;text-align:center;">no results found according to your specifications</th>
            @else --}}

                <div class="container bootstrap snippets bootdey">
                    <hr>
                    <ol class="breadcrumb">
                        <li><a href="#">Refresh</a></li>

                        <li class="pull-right"><a href="">
                                <i class="fa fa-refresh"></i></a>
                        </li>
                    </ol>
                    <div class="row">
                        @foreach ($posts as $post)
                        {{-- @if($loop->index %2 == 0 ) --}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="well blog">

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                            <div class="image">
                                                <img src="{{asset('storage/profiles/'.$post->imagepost)}}">

                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <div class="blog-details">
                                                <h2>Post title: {{ $post->title }} </h2>
                                                 @if($post->vendor)
                                                <h6>Post publisher: {{ $post->vendor->name }} </h6>
                                                @endif
                                                @if($post->hall)
                                                <h6>Post publisher: {{ $post->hall->name }} </h6>
                                                @endif
                                                <p>{{ $post->description }}
                                                <div class="blog">


                                                    <i><i class="fa fa-usd pr-1"></i>Price: {{ $post->price }} <div
                                                            class="blog">
                                                            </li>
                                                        </div>
                                                        </p>
                                                </div>


                                                <form  method="post" action="/posts/{{$post->id}}/accepted" id="accepte{{$post->id}}">
                                                    @csrf
                                                    @method('PUT')
                                                <button type="submit" class="btn btn-success" onclick="document.getElementById('accepte{{$post->id}}').submit(); return false;">Accept</button>
                                                </form>

                                                <form  method="post" action="/posts/{{$post->id}}/Refuse" id="Refuse{{$post->id}}">
                                                    @csrf
                                                    @method("DELETE")
                                                <button type="submit" class="btn btn-danger" onclick="document.getElementById('Refuse{{$post->id}}').submit(); return false;">Refuse</button>
                                                </form>

                                                @if($post->find($post->id)->accepted)
                                                <button type="submit" class="btn btn-success">Accept</button>
                                                @endif


                                            </div>
                                        </div>

                                    </div>
                                    {{-- @if($loop->last && $loop->index%2 == 0) --}}
                                </div>
                                {{-- @endif --}}
                        @endforeach
                        {{-- end row --}}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>
