<div class="modal fade" tabindex="-1" id="mod_category_del">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header 1ps-4 pe-4">  
        <h5 class="modal-title">Delete category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

<div class="modal-body mb-3">
    
    <div id="alertCheckCategory_del"></div>
          
<div class="form-floating 1mt-2 1mb-1 my-1 py-1">  
    <select class="form-select pb-1 1border-0 1border-bottom"
            1id="floatingSelect"
            aria-label="Floating label select example"
            id="category_del">         

    </select>
<label for="optionAdd_del">Select category:</label>

</div>
    <button type="button"
            class="btn btn-outline-danger rounded-5 col-12 py-2 fs-5 mt-4"
            id="butCheckDate1"
            onclick="delCategory()">Delete
    </button>
</div>           
        </div>
    </div>
</div>