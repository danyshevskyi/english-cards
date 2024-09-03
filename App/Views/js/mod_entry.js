let getButEntry = document.querySelector('#nav-home-tab');
    let getButReg = document.querySelector('#nav-profile-tab');   
        let getButEntryCont = document.querySelector('#nav-home');
            let getButRegCont = document.querySelector('#nav-profile');

function pressLogin() {
    getButEntry.classList.add("active");
        getButEntryCont.classList.add("active", "show");
    getButReg.classList.remove("active");
        getButRegCont.classList.remove("active", "show");     
}

function pressReg() {
    getButReg.classList.add("active");
        getButRegCont.classList.add("active", "show");
    getButEntry.classList.remove("active");
        getButEntryCont.classList.remove("active", "show");
}

async function butAuth() {
    
    let email = $('#authInputLogin').val();
        let pass = $('#authInputPass').val();
            let rem = $('#authRem').val();

    let dataUser = {
                      key: 'auth',
                      email: email,
                      pass: pass,
                      rem: rem  
                    };              

    let response = await fetch (
                    'https://dov.pp.ua/auth/',
                    {
                        method: 'POST',  
                        headers:
                                {
                                    'Content-Type': 'application/json;charset=utf-8'
                                },
                        body: JSON.stringify(dataUser)
                    }
                );
                // .then(response => response.json());
                // .then(data => console.log(data));
               
                    let result = await response.json();

    if(result['status'])
    {
        location.replace('https://dov.pp.ua/english-cards/');
    }
    else
    {
        document.querySelector('#alertLogin').hidden = false;
            document.querySelector('#alertRegPass').value = null;
    }
}

async function butReg() {

    let email = $('#inputRegEmail').val();
        let pass1 = $('#inputRegPass1').val();
            let pass2 = $('#inputRegPass2').val();
                let rem = $('#regRem').prop('checked');

    let wrongLogin = $('#wrongLogin');
        let wrongPass = $('#wrongPass');

    // Check of correct email
    if(validEmail(email))
    {       
        // Check of password match
        if(pass1 === pass2)
        {
            // Registration
            let dataUser = {
                              key: 'reg',
                              email: email,
                              pass: pass1,
                              rem: rem  
                            };

              let response = await fetch (
                        'https://dov.pp.ua/auth/',
                        {
                            method: 'POST',  
                            headers:
                                    {
                                        'Content-Type': 'application/json;charset=utf-8'
                                    },
                            body: JSON.stringify(dataUser)
                        }
                    );
                   
                    let result = await response.json();

                if(result['status'])
                {
                    location.replace('https://dov.pp.ua/english-cards/');
                }
                else
                {
                    wrongLogin.html('Sorry, but this email is already registered! Please choose another one!');
                        wrongLogin.show();
                            wrongPass.hide();                       
                }
        }
        else
        {
            wrongPass.html('Sorry, but the passwords do not match! Please check your input for accuracy!');
                wrongLogin.hide();
                    wrongPass.show();
        }
    }
    else
    {
        wrongLogin.html('Sorry, but the email must be in the format user@example.com');
            wrongLogin.show();
                wrongPass.hide();       
    }
}

async function butEnd() {

    if (confirm('Are you sure you want to log out?')) {
        let key = 
                {
                    key: 'end'
                };
           let result = await fetch('https://dov.pp.ua/auth/',
                {
                    method: 'POST',
                    headers:
                            {
                            'Content-Type': 'application/json;charset=utf-8'
                            },
                    body: JSON.stringify(key)
                }
            ).then(response => response.json());
    
                if(result['status'])
                {
                    location.replace('https://dov.pp.ua/english-cards/');
                }
    }
}

function validEmail(email) {
    // let getInputEmail = document.querySelector('#' + inputID);
        let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if(email.match(validRegex))
            {
                return true;
            }
            else
            {
                return false;
            }
}

function passShow(classInput) {
    let getInput = document.querySelectorAll('.' + classInput);
        let getEye = document.querySelector('#' + classInput);

        for(let i = 0; i < getInput.length; i++) {  
                if(getInput[i].type === "password")
                {
                    getInput[i].type = "text";
                } 
                else 
                {
                    getInput[i].type = "password";
                }
        }
                getEye.classList.toggle('bi-eye-slash');
            getEye.classList.toggle('bi-eye');
}
