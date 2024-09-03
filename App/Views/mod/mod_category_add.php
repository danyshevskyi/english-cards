<div class="modal fade" tabindex="-1" id="mod_category_add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header 1ps-4 pe-4">  
        <h5 class="modal-title">Create category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

<div class="modal-body mb-3">
    
    <div id="alertCheckCategory_add"></div>
          
    <div class="form-floating my-1 py-1">
      <input type="text" class="form-control fs-3" id="category_add">
        <label for="floatingPassword">Name of category:</label>
    </div>

        <button type="button"
                class="btn btn-outline-success rounded-5 col-12 py-2 fs-5 mt-4"
                id="butCheckDate1"
                onclick="addCategory()">
                Create
        </button>

</div>           
        </div>
    </div>
</div>