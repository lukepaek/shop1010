</br>
<div class="py-3 bg-gray-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 my-2">
                <h1 class="m-0 h4 text-center text-lg-start">Payment</h1>
            </div>
            <div class="col-lg-6 my-2">
                <ol class="breadcrumb dark-link m-0 small justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item">
                        <a class="text-nowrap" href="https://www.pxdraft.com/wrap/shopapp/html/account/account-payment.html#"><i class="bi bi-home"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Payment</li>
                </ol>
            </div>
        </div>
    </div>
</div><!-- End Breadcrumb -->

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
                                <h6 class="m-0">Visa Card</h6>
                                <span class="ms-auto"><img width="40" src="./Payment_files/card-visa.png" title="" alt=""></span>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <span class="small letter-spacing-2">CARD NUMBER</span>
                                        <h6 class="m-0 mt-1">xxxx xxxx xxxx 5050</h6>
                                    </div>
                                    <div class="col-8">
                                        <span class="small letter-spacing-2">NAME OF CARD</span>
                                        <h6 class="m-0 mt-1">Nancy Bayers</h6>
                                    </div>
                                    <div class="col-4">
                                        <span class="small letter-spacing-2">VALIDITY</span>
                                        <h6 class="m-0 mt-1">xx / xx</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex p-3">
                                <a class="link-mode text-uppercase fw-500" href="https://www.pxdraft.com/wrap/shopapp/html/account/account-payment.html#">Edit </a>
                                <a class="link-danger text-uppercase fw-500 ms-auto" href="https://www.pxdraft.com/wrap/shopapp/html/account/account-payment.html#">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header py-3 d-flex align-items-center">
                                <h6 class="m-0">Master Card</h6>
                                <span class="ms-auto"><img width="40" src="./Payment_files/card-master.png" title="" alt=""></span>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12"><span class="small letter-spacing-2">CARD NUMBER</span><h6 class="m-0 mt-1">xxxx xxxx xxxx 5050</h6></div>
                                    <div class="col-8"><span class="small letter-spacing-2">NAME OF CARD</span><h6 class="m-0 mt-1">Nancy Bayers</h6></div>
                                    <div class="col-4"><span class="small letter-spacing-2">VALIDITY</span><h6 class="m-0 mt-1">xx / xx</h6></div>
                                </div>
                            </div>
                            <div class="card-footer d-flex p-3">
                                <a class="link-mode text-uppercase fw-500" href="https://www.pxdraft.com/wrap/shopapp/html/account/account-payment.html#">Edit </a>
                                <a class="link-danger text-uppercase fw-500 ms-auto" href="https://www.pxdraft.com/wrap/shopapp/html/account/account-payment.html#">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header py-3"><h6 class="m-0">Add New Address</h6></div>
                    <div class="card-body p-3">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="cc-number_1" data-format="card" placeholder="Card number">
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="cc-number" data-format="card" placeholder="Your Name">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-7 form-group">
                                        <input class="form-control" type="text" id="cc-expiry" data-format="date" placeholder="Expiry Date">
                                    </div>
                                    <div class="col-5 form-group">
                                        <input class="form-control" type="password" id="cc-cvc" data-format="cvc" placeholder="CVC">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary d-block w-100" type="submit">Register this card</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Content -->
        </div>
    </div>
</div>