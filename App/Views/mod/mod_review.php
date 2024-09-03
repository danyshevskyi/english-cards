<div class="modal fade" tabindex="-1" id="mod_review">
    <div class="modal-dialog">
        <div class="modal-content">

<div class="modal-header">  
    <h5 class="modal-title"><i class="bi bi-pen ps-1 pe-2"></i>Write a review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">

<form>
        <div>
            <textarea class="form-control"
                    id="message"
                    rows="5"
                    placeholder=""
                    maxlength="1000"
                    name="message"></textarea>
        </div>
</div>

        <div class="modal-footer">
            <button type="button"
                    class="btn btn-primary px-4 t18"
                    onclick="reviewAdd()">Send &nbsp;<i class="bi bi-send"></i></button>
        </div>

</form>

        </div>
    </div> 
</div>