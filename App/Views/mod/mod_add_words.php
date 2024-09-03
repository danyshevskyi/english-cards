<div class="modal fade" tabindex="-1" id="mod_add_words">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header 1ps-4 pe-4">  
        <h5 class="modal-title">Create new card</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
<div class="modal-body">
    <div id="alertCheckDate"></div>
           
<div class="form-floating mb-3 py-1">
  <input type="text" class="form-control fs-3" id="translate">
    <label for="floatingPassword">English:</label>
        </div>

<div class="form-floating py-1">
  <input type="text" class="form-control fs-3" id="native">
    <label for="floatingPassword">Translation:</label>
        </div>

<div class="form-floating mt-3 1py-5">
    <textarea class="form-control fs-4"
            _placeholder="Leave a comment here"
            1id="floatingTextarea"
            style="height: 120px"
            id="sentence"></textarea>
  <label for="sentence">Sentence:</label>
</div>

<div class="form-floating mt-3">
    
    <select class="form-select pb-1 border-0 border-bottom"
            1id="floatingSelect"
            aria-label="Floating label select example"
            id="categoryAdd"></select>

      <label for="categoryAdd">Select category:</label>

</div>
</div>

<div class="container 1modal-footer 1bb text-center mb-4 mt-2">
        
        <button type="button"
                class="btn btn-outline-success rounded-5 col-12 py-2 fs-5"
                id="butCheckDate"
                onclick="addWords()">Add</button>
</div>
            
        </div>
    </div>
</div>