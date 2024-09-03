<div class="modal fade" tabindex="-1" id="mod_entry">
  <div class="modal-dialog">
    <div class="modal-content">

<!------------------- navigation ------------------->
<div class="nav nav-tabs pt-3 mb-2 t18 1border-secondary border-opacity-100" id="nav-tab" role="tablist">

    <button class="nav-link but_tab_reg"
            id="nav-home-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-home"
            type="button"
            role="tab"
            aria-controls="nav-home"
            aria-selected="true">
            Sign in
    </button>
    
    <button class="nav-link"
            id="nav-profile-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-profile"
            type="button"
            role="tab"
            aria-controls="nav-profile"
            aria-selected="false">
            Registration
    </button>

    <button type="button"
            class="btn-close t18 me-3 ms-auto"
            data-bs-dismiss="modal"
            aria-label="Close">
    </button>
    
</div>
<!------------------- /navigation ------------------->

<div class="tab-content" id="nav-tabContent">

<!------------------- Login form ------------------->
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="modal-body">
            
            <div class="text-center text-danger mb-3"
                 id="alertLogin"
                 hidden>
                 Sorry, the login or password is incorrect!
            </div>

    <div class="form-floating mb-3">
        <input id="authInputLogin"
               _name="email"
               type="text"
               class="form-control form-control-lg border-secondary border-opacity-50"
               placeholder="name@example.com"
               maxlength="50"
               required>
            <label for="authInputLogin">
            <span class="text-secondary">Email</label>
    </div>

    <div class="col form-floating position-relative 1bb">
        <input id="authInputPass"
               _name="pass"
               type="password"
               class="form-control form-control-lg inputPassAuth border-secondary border-opacity-50"
               placeholder="Password"
               maxlength="50"
               required>
               <label for="authInputPass">
               <span class="text-secondary">Password</span></label>
        <div class="col-2 position-absolute top-0 end-0 1mt-2 text-center 1bb pb-1"
             style="margin-top: 11px;" 
             onclick="passShow('inputPassAuth')">
             <i class="bi bi-eye fs-4 text-secondary text-center 1py-1" id="inputPassAuth"></i>
        </div>      
    </div>

    <div class="form-check mt-3 t18">
        <input id="authRem"
               class="form-check-input border-secondary border-opacity-50"
               type="checkbox"
               _name="rem"
               value="1">
               <label class="form-check-label" for="authRem">Remember me</label>
    </div>

    </div>
    
    <div class="modal-footer">
        <button type="button"
                class="btn btn-primary px-4 fs-5"
                onclick="butAuth('analytics')">
                    &nbsp;Enter&nbsp;
        </button>
    </div>

</div>
<!-------------------- /Login form --------------------------->    


<!-------------------- Registration form --------------------->
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    <form method="POST" id="formReg"> 
        <input name="keyPOST" value="reg" _id="auth" hidden>     

<div class="modal-body">

    <div id="wrongLogin" class="text-center text-danger mb-3" style="display: none;"></div>

    <div class="form-floating mb-4">
        <input
            name="email"
            type="text"
            class="form-control form-control-lg border-secondary border-opacity-50"
            id="inputRegEmail"
            placeholder="name@example.com"
            maxlength="50"
            required>
                <label for="inputRegEmail"><span class="text-secondary">Email</label>
    </div>

        <div id="wrongPass" class="text-center text-danger"></div>

    <div class="col form-floating position-relative mt-3">
      <input
        name="pass"
        type="password"
        class="form-control form-control-lg border-secondary border-opacity-50 inputPassReg"
        id="inputRegPass1"
        placeholder="Password"
        maxlength="50"
        required>
            <label for="inputRegPass1"><span class="text-secondary">Password</span></label>
        <div class="col-2 position-absolute top-0 end-0 1mt-2 text-center 1bb pb-1"
             style="margin-top: 11px;" 
             onclick="passShow('inputPassReg')">
            <i class="bi bi-eye fs-4 text-secondary text-center 1py-1" id="inputPassReg"></i>
        </div>
    </div>

    <div class="col form-floating position-relative mt-3">
      <input    
        name="pass"
        type="password"
        class="form-control form-control-lg border-secondary border-opacity-50 inputPassReg"
        id="inputRegPass2"
        placeholder="Password"
        maxlength="50"
        required>
            <label for="inputRegPass2"><span class="text-secondary">Password again</span></label>
    </div>

    <div class='form-text mt-2'>
        &#10004; The password can be any of Latin letters and numbers
    </div>

    <div class="form-check mt-3 1fs-5 t18">
        <input name="rem" 
               class="form-check-input border-secondary border-opacity-50"
               type="checkbox"
               id="regRem"
               _value="1">
               <label class="form-check-label" for="regRem">Remember me</label>
    </div>

</div>

    <div class="modal-footer 1border-secondary 1border-opacity-50">
        <button type="button"
                class="btn btn-primary px-4 fs-5"
                onclick="butReg('analytics')">
                Sign up
        </button>
    </div>

    </form>
</div>
<!-------------------- /Registration form --------------------->

            </div>
        </div>
    </div>
</div>