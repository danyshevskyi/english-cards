function changeBut() {
    
    let butReg = $('#aboutButReg');
    
    butReg.html('Do you know how to improve?');
        butReg.removeAttr('onclick');
            butReg.attr('data-bs-target', '#mod_review');
}

changeBut();
