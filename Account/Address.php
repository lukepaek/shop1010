</br>
<div class="py-3 bg-gray-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 my-2"><h1 class="m-0 h4 text-center text-lg-start">My Address</h1></div>
            <div class="col-lg-6 my-2">
                <ol class="breadcrumb dark-link m-0 small justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item">
                        <a class="text-nowrap" href="https://www.pxdraft.com/wrap/shopapp/html/account/account-address.html#"><i class="bi bi-home"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">My Address</li>
                </ol>
            </div>
        </div>
    </div>
</div><!-- End Breadcrumb -->

<!-- Table -->
<div class="py-6">
    <div class="container">
        <div class="row"><!-- Profile Menu -->
            
             <?php  include 'account/Dashboard.php';?>
            
            <!-- Content -->
            <div class="col-lg-8 col-xxl-9">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header py-3 d-flex align-items-center">
                                <h6 class="m-0">Billing Address</h6>
                                <a class="ms-auto px-1 lh-sm py-1 btn btn-sm btn-primary" href="https://www.pxdraft.com/wrap/shopapp/html/account/account-address.html#"><i class="bi bi-pencil-square"></i></a>
                            </div>
                            <div class="card-body">
                                <p class="m-0">EDWARD JOE<br>301 The Greenhouse London,<br>E2 8DY UK<br>United Kingdom<br>(0123)-456789<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header py-3 d-flex align-items-center">
                                <h6 class="m-0">Billing Address</h6>
                                <a class="ms-auto px-1 lh-sm py-1 btn btn-sm btn-primary" href="https://www.pxdraft.com/wrap/shopapp/html/account/account-address.html#"><i class="bi bi-pencil-square"></i></a>
                            </div>
                            <div class="card-body">
                                <p class="m-0">EDWARD JOE<br>301 The Greenhouse London,<br>E2 8DY UK<br>United Kingdom<br>(0123)-456789<br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header py-3"><h6 class="m-0">Add New Address</h6></div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="address-fn">First name</label> 
                                <input class="form-control" type="text" id="address-fn" required="">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-ln">Last name</label> 
                                <input class="form-control" type="text" id="address-ln" required="">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-company">Company</label> 
                                <input class="form-control" type="text" id="address-company">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-country">Country</label> 
                                <select class="form-select" id="address-country" required="">
                                    <option value="">Select country</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Spain">Spain</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="USA">USA</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-city">City</label> 
                                <input class="form-control" type="text" id="address-city" required="">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-line1">Line 1</label> 
                                <input class="form-control" type="text" id="address-line1" required="">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-line2">Line 2</label> 
                                <input class="form-control" type="text" id="address-line2">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="address-zip">ZIP code</label> 
                                <input class="form-control" type="text" id="address-zip" required="">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="address-primary"> 
                                    <label class="form-check-label" for="address-primary">Make this address primary</label>
                                </div>
                            </div>
                            <div class="col-12"><button class="btn btn-primary">Add New Address</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Content -->
        </div>
    </div>
</div>