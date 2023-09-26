<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="Users.html">Main Menu</a>
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

                            <div class="sb-sidenav-menu-heading"> CORE </div>
                            <a class="nav-link" href="Dashboard.html">
                                <div class="sb-nav-link-icon"><i class="bi bi-speedometer2"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interfaces</div>
                            <a class="nav-link" href="/showAdminUsers">
                                <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="/showAdminvendors">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-square"></i></div>
                               Vendors
                            </a>
                            <a class="nav-link" href="/showAdminHalls">
                                <div class="sb-nav-link-icon"><i class="bi bi-slack"></i></div>
                                Hall
                            </a>
                            <a class="nav-link" href="/showcopon">
                                <div class="sb-nav-link-icon"><i class="bi bi-upc-scan"></i></div>
                               Copun
                            </a>
                            <a class="nav-link" href="/showpost">
                                <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-post"></i></div>
                                View Posts
                            </a>
                            <a class="nav-link" href="/showreport">
                                <div class="sb-nav-link-icon"><i class="bi-exclamation-circle"></i></div>
                                Reporting Review User
                            </a>

                            <a class="nav-link" href="/showreportVendor">
                                <div class="sb-nav-link-icon"><i class="bi-exclamation-circle"></i></div>
                                Reporting Review Vendor
                            </a>
                            <a class="nav-link" href="/showreportHall">
                                <div class="sb-nav-link-icon"><i class="bi-exclamation-circle"></i></div>
                                Reporting Review Hall
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


                  <style>
                    * {
                      box-sizing: border-box;
                    }

                    body {
                      margin: 0;
                      font-family: Arial;
                      font-size: 17px;
                    }

                    #myVideo {
                      position: fixed;
                      right: 0;
                      bottom: 0;
                      min-width: 100%;
                      min-height: 100%;
                    }

                    .content {
                      position: fixed;
                      bottom: 0;
                      background: rgba(0, 0, 0, 0.5);
                      color: #f1f1f1;
                      width: 100%;
                      padding: 20px;
                    }

                    #myBtn {
                      width: 200px;
                      font-size: 18px;
                      padding: 10px;
                      border: none;
                      background: #000;
                      color: #fff;
                      cursor: pointer;
                    }

                    #myBtn:hover {
                      background: #ddd;
                      color: black;
                    }
                    </style>
                    </head>
                    <body>

                    <video autoplay muted loop id="myVideo">
                      <source src="{{asset('images/depositphotos.mp4')}}" type="video/mp4">
                      Your browser does not support HTML5 video.
                    </video>

                    <div class="content">
                      <h1>Evento</h1>
                      <p style=" font-size: 17px; color:#f1f1f1">It is an integrated application that helps customers to browse the service provider,
                         their services, prices, and the areas in which they
                        are located.
                      </p>
                 <p style=" font-size: 17px;color:#f1f1f1">It enables them to book a specific service and manage their events,
                       in addition to reaching them,</p>
                       <p style=" font-size: 17px;color:#f1f1f1">it allows the service provider to manage and display their reservations
                      in an orderly manner.</p>
                      <button id="myBtn" onclick="myFunction()">Pause</button>
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
<script>
  var video = document.getElementById("myVideo");
  var btn = document.getElementById("myBtn");

  function myFunction() {
    if (video.paused) {
      video.play();
      btn.innerHTML = "Pause";
    } else {
      video.pause();
      btn.innerHTML = "Play";
    }
  }
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>

</body>
</html>
