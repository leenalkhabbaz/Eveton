<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Ad</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
                        <h2 class="mt-4">Add Ad</h2>
                        <br>
                        <div class="card mb-4">
                            <div class="card-body">
                                The service provider asks the admin to create an advertisement in order to promote his services and provide more information about them.
                            </div>
                        </div>


                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                      @endif



                        {{-- <form class="form"> --}}
                            <form class="form" name="publicities" id="publicities" method="post" action="{{url('publicities')}}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                            <fieldset>
                            <legend style="text-align:center">Ad Type</legend>

                              <div class ="position">
                                <input type="checkbox" id="otherr" name="default" value="default" class="@error('default') is-invalid @enderror">
                                     @error('default')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                <label for="otherr" >Default Ad</label>
                                <input type="text" id="Value" name="vendorName" placeholder="Enter Vendor Ad Name" class="@error('vendorName') is-invalid @enderror">
                                @error('vendorName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                <input type="textt" id="Valuee" name="hallName" placeholder="Enter Hall Ad Name"class="@error('hallName') is-invalid @enderror">
                                @error('hallName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                              </div>

                              <div class ="position">
                                <input type="checkbox" id="other" name="copun" value="copun"class="@error('copun') is-invalid @enderror">
                                @error('copun')
                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                <label for="other" >Copun Ad</label>
                                <input type="text" id="otherValue" name="copunCode" placeholder="Enter Ad Code"class="@error('copunCode') is-invalid @enderror">
                                @error('copunCode')
                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                              </div>

                              <div class ="pic">
                                {{-- <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"><i class="bi bi-camera-fill"></i> Add Picture </a> --}}
                                <input type="file"  id="image" name="image" class="@error('image') is-invalid @enderror" required="">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                            </div>
                            <div class="form-button pt-4" style="margin-left: 200px;margin-bottom:30px">

                            <button type="submit" class="btn btn-primary">Add</button>

                        </div>
                            </fieldset>
                          </form>


                            <!---->
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
const otherCheckbox = document.querySelector('#other');
const otherText = document.querySelector('#otherValue');
otherText.style.visibility = 'hidden';

otherCheckbox.addEventListener('change', () => {
  if(otherCheckbox.checked) {
    otherText.style.visibility = 'visible';
    otherText.value = '';
  } else {
    otherText.style.visibility = 'hidden';
  }
});


    </script>

    <!------>

    <script>
        const Checkbox = document.querySelector('#otherr');
        const Text = document.querySelector('#Value');
        const Textt = document.querySelector('#Valuee');
        Text.style.visibility = 'hidden';
        Textt.style.visibility = 'hidden';
        Checkbox.addEventListener('change', () => {
          if(Checkbox.checked) {
            Text.style.visibility = 'visible';
            Text.value = '';
            Textt.style.visibility = 'visible';
            Textt.valuee = '';
          } else {
            Text.style.visibility = 'hidden';
            Textt.style.visibility = 'hidden';
          }
        });


            </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>

</body>
</html>
