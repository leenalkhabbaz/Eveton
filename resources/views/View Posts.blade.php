<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View Posts</title>
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
            {{-- <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar--> --}}
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
                           <!--   <div class="sb-sidenav-menu-heading">Core</div>
                          <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a> -->

                          <!---------------------------------------------------------->

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
                        <ol>
                            View Posts
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Displaying user posts that will be used in the application in order for the admin to approve or reject the publication before displaying it in the application.
                            </div>
                        </div>

                    </div>



                <div class="container bootstrap snippets bootdey">
                    <hr>
                  <ol class="breadcrumb">
                    <li><a href="#">Refresh</a></li>

                    <li class="pull-right"><a href="">
                      <i class="fa fa-refresh"></i></a>
                    </li>
                  </ol>
                  @foreach ($posts as $post)
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="user-block blog border22">
                            @if($post->vendor)
                            <img class="img-circle" src="{{asset('storage/UserPhoto/VendorProfile/'.$post->vendor->profile_thumbnail )}}" alt="User Image" style=" border-radius: 50%; margin-left:5%;margin-top:12px;
                            ">
                            @endif
                            @if($post->hall)
                            <img class="img-circle" src="{{asset('storage/UserPhoto/VendorProfile/'.$post->hall->profile_thumbnail )}}" alt="User Image"style=" border-radius: 50%; margin-left:5%;margin-top:12px;    ">
                            @endif


                            @if($post->vendor)
                            <span class="vendorname" >{{ $post->vendor->name }}</a></span>
                            <span class="description"style=" margin-left:5%;margin-top:12px;">{{ $post->vendor->type }}</span>
                            @endif
                            @if($post->hall)
                            <span class="hallname">{{ $post->hall->name }}</a></span>
                            <span class="description">Hall</span>
                            @endif

                          </div>
                          <div class="well blog">


                                  <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <div class="image">
                                            <img src="{{asset('storage/profiles/'.$post->imagepost)}}">

                                        </div>

                                    </div>
                                      {{-- <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <div class="slideshow-container">

                                            <div class="mySlides fade">
                                              <div class="numbertext">1 / 3</div>
                                              <img src="Windows_live_square.jpg" style="width:100%">
                                              <div class="text">Caption Text</div>
                                            </div>

                                            <div class="mySlides fade">
                                              <div class="numbertext">2 / 3</div>
                                              <img src="download.jpg" style="width:100%">
                                              <div class="text">Caption Two</div>
                                            </div>

                                            <div class="mySlides fade">
                                              <div class="numbertext">3 / 3</div>
                                              <img src="download.png" style="width:100%">
                                              <div class="text">Caption Three</div>
                                            </div>

                                            </div>
                                            <br>

                                            <div style="text-align:center">
                                              <span class="dot"></span>
                                              <span class="dot"></span>
                                              <span class="dot"></span>
                                            </div>
                                      </div> --}}
                                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                          <div class="blog-details">
                                              <h5>Post title :{{ $post->title }}</h5>
                                              <p>
                                                {{ $post->description }}                                                              <div class="blog">
                                                              <i><i class="fa fa-usd pr-1"></i>Price: {{ $post->price }}</li>
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
                                        <button type="submit" class="btn btn-danger" onclick="document.getElementById('Refuse{{$post->id}}').submit(); return false;" style="margin-top: 10%">Refuse</button>
                                        </form>

                                        @if($post->find($post->id)->accepted)
                                        <button type="submit" class="btn btn-success">Accept</button>
                                        @endif
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
        </div></div>
        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 2000); // Change image every 2 seconds
            }
            </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="assets/demo/chart-pie-demo.js"></script>
</body>
</html>
