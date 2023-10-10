<!-- Login Popup  -->
<div class="modal fade" id="topbarlogin">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <div class="modal-title p-3">
            <h5 class="m-0 text-white">Sign in to your account!</h5>
            <p class="m-0 text-white">Nice to see you! Please log in with your account.</p>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="w-100 p-3"><!-- Form START -->
            <form>
              <div class="mb-3">
                <label class="form-label">Email address</label> 
                <input type="email" class="form-control" id="log_email" placeholder="E-mail">
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label> 
                <input type="password" class="form-control" id="log_pwd" placeholder="*********">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1"> 
                <label class="form-check-label" for="exampleCheck1">keep me signed in</label>
              </div>
              <div class="row align-items-center">
                <div class="col-sm-4">
                  <button type="button" OnClick="LogIn()" class="btn btn-dark">Login</button>
                </div>
                <div class="col-sm-8 text-sm-end">
                  <span class="text-muted">Don't have an account? <a href="#">Signup here</a></span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Login Popup  -->