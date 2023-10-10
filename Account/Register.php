<!-- Register Popup  -->
<div class="modal fade" id="topbarregister">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <div class="modal-title p-3">
            <h5 class="m-0 text-white">Sign Up</h5>
            <p class="m-0 text-white">Nice to see you! Please Sign up to get log in!</p>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="w-100 p-3"><!-- Form START -->
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Name<span class="text-danger">*</span></label> 
                            <input type="text" id="rg_name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Email<span class="text-danger">*</span></label> 
                            <input type="email" id="rg_email" class="form-control" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label col">Password<span class="text-danger">*</span></label> 
                            <input type="password" class="form-control" id="rg_pwd" placeholder="*********">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label col" >Conform Password<span class="text-danger">*</span></label> 
                            <input type="password" class="form-control" id="rg_pwd_confirmed" placeholder="*********">
                        </div>
                    </div>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example3" checked="checked"> 
                    <label class="form-check-label" for="form2Example3">By register, I read &amp; accept the terms.</label>
                </div>
                <div class="form-group row align-items-center">
                    <div class="col"><button type="button" onclick="Register()" class="btn btn-primary">Create Account</button></div>
                    <div class="col-12 col-sm text-sm-end mt-3 mt-sm-0">
                        <span class="text-muted">Have an account? <a href="#">Login here</a></span>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Login Popup  -->