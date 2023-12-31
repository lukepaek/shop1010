</br>
<?php 
    require_once('CheckOut\CheckOutLoading.php');
?>
<div class="py-3 bg-gray-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 my-2"><h1 class="m-0 h4 text-center text-lg-start">Checkout</h1></div>
            <div class="col-lg-6 my-2">
                <ol class="breadcrumb dark-link m-0 small justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="https://www.pxdraft.com/wrap/shopapp/html/account/checkout.html#"><i class="bi bi-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                </ol>
            </div>
        </div>
    </div>
</div><!-- End Breadcrumb -->

<!-- Table -->
<div class="py-6">
    <div class="container">
        <div class="row flex-row-reverse"><!-- sidebar -->
        
            <div class="col-lg-5 ps-lg-5">
                <div class="card">
                    <div class="card-body" >
                        <?php echo LoadingCheckOut('dymong007@gmail.com');?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="border-bottom mb-4 pb-3">Shipping address</h5>
                        <form>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">First Name</label> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Last Name</label> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Email Address</label> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Street</label> 
                                    <input type="email" class="form-control" id="exampleInputEmail3">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">City</label> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">ZIP</label> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">State</label> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Phone Number</label> 
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> 
                                        <label class="form-check-label" for="flexCheckDefault">Use a different shipping address</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="accordion accordion-alt pt-4" id="payment-methods">
                    <div class="card mb-3 shadow-none border">
                        <div class="card-header p-0 position-relative bg-transparent">
                            <div class="form-check m-3" data-bs-toggle="collapse" data-bs-target="#credit-card">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked=""> 
                                <label class="form-check-label h6 m-0 w-100 stretched-link" for="flexRadioDefault1">Credit Card</label>
                            </div>
                        </div>
                        <div class="collapse show" id="credit-card" data-bs-parent="#payment-methods">
                            <div class="card-body p-3">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="cc-number">Card number</label> 
                                    <input class="form-control" type="text" id="cc-number" data-format="card" placeholder="0000 0000 0000 0000">
                                </div>
                                <div class="g-2 row">
                                    <div class="col-7 form-group mb-1">
                                        <label class="form-label" for="cc-expiry">Expiry date</label> 
                                        <input class="form-control" type="text" id="cc-expiry" data-format="date" placeholder="mm/yy">
                                    </div>
                                    <div class="col-5 form-group mb-1">
                                        <label class="form-label" for="cc-cvc">CVC</label> 
                                        <input class="form-control" type="password" id="cc-cvc" data-format="cvc" placeholder="000">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none border">
                        <div class="card-header p-0 position-relative bg-transparent">
                            <div class="form-check m-3 collapsed" data-bs-toggle="collapse" data-bs-target="#paypal">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="paypal-radio1"> 
                                <label class="form-check-label h6 m-0 stretched-link" for="paypal-radio1">Paypal</label>
                            </div>
                        </div>
                        <div class="collapse" id="paypal" data-bs-parent="#payment-methods">
                            <div class="card-body p-3">
                                <p class="mb-0">By clicking on the button below you will be redirected to your PayPal account to complete the payment.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary w-100">Place Order</button>
                    <p class="m-0 pt-3">By placing your order you agree to our 
                        <a href="https://www.pxdraft.com/wrap/shopapp/html/account/checkout.html#">Terms &amp; Conditions</a>, 
                        <a href="https://www.pxdraft.com/wrap/shopapp/html/account/checkout.html#">privacy and returns</a> policies. You also consent to some of your data being stored by ShopApp, which may be used to make future shopping experiences better for you.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div><!--Table -->



