{% extends "base.php" %}

{% block body %}
<!-- header -->
<div class="container sticky-top 1bg-white 1bb bg-image 1bb pb-2" 1style="max-width: 800px;">

    <div class="row justify-content-between 1bb mt-3 trainMode" id="menu">
        
    <div class="col-auto ps-2" style="padding-top: 5px">
            <a href="https://dov.pp.ua/english-cards/" class="text-decoration-none text-black">
                <h5>
                <i class="bi bi-copy pe-1"></i>
                English Cards
                </h5>
            </a>
    </div>

        <div class="col 1bb text-center 1pt-1 fs-5" style="padding-top: 3px">
            <i class="bi bi-fire pe-2"></i><span id="word_count"></span>
        </div>
        <!-- btn-light -->
        <div class="col-auto 1me-3 1bb">
            <button type="button"
                    class="btn btn-outline-dark text-decoration-none"
                    data-bs-toggle = "dropdown"
                    1data-bs-target = "#mod_entry"
                    1style = "height: 45px;"
                    1onclick = "pressEntry()">
                    Menu
            </button>
        
            <ul class="dropdown-menu bg-image">
                <li><a class="dropdown-item" href="#"><b>{{ email }}</b></a></li>
                
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-item px-0">
                    <buttom type="buttom"
                            class="btn btn-link text-decoration-none text-start text-black col-12"
                            data-bs-toggle = "modal"
                            data-bs-target = "#mod_shortcut">
                            <i class="bi bi-box-arrow-in-up-right ps-1 pe-2 1fs-5"></i>Add to Home screen
                    </buttom>
                
                </li>
                <li class="dropdown-item px-0">
                    <buttom type="buttom"
                            class="btn btn-link text-decoration-none text-start text-black col-12"
                            data-bs-toggle = "modal"
                            data-bs-target = "#mod_review">
                            <i class="bi bi-pen ps-1 pe-2"></i>Write a review
                    </buttom>
                
                </li>
                <li class="dropdown-item px-0">
                    <buttom type="buttom"
                            class="btn btn-link text-decoration-none text-start text-black col-12"
                            data-bs-toggle = "modal"
                            data-bs-target = "#mod_about">
                            <i class="bi bi-info-circle ps-1 pe-2"></i>About
                    </buttom>
                </li>
                           
                <li><hr class="dropdown-divider"></li>
                
                <li><a class="dropdown-item" onclick="butEnd()"><i class="bi bi-door-open pe-2"></i>Sign out</a></li>
            </ul>
        </div>

    </div>

    <div class="1container row mt-2 d-flex justify-content-between">
        
        <div class="col-auto pe-0" style="padding-top: 5px">
            <button type="button"
                    id="pageSort" 
                    class="btn text-secondary 1ps-0 1ms-0 p-0"
                    onclick="pageSort('start')"
                    1style="display: none">
                    Page <span id="current">0</span> from  <span id="total">0</span>
            </button> 
        </div>

        <div class="col-auto trainMode px-0 1opacity-0" id="divSelectMain" style="max-width: 195px;"></div>
      
        <select class="form-select me-0 border-0 bg-color"
                    id="cloneCategory" 
                    aria-label="Default select example"
                    style="display:none;">
              <option value="0" id="option">Create category</option>
              <option value="del">Delete category</option>
        </select>

    </div>

</div>
<!-- /header -->

<!-- body -->
<div class="container" id="body">

    <!-- New card -->
    <div class="mx-auto mt-3 px-2 py-1 border border-light-subtle rounded-4 text-center myCard bg-white position-relative"
         id="myCard"    
         style="max-width: 500px; display: none;">
    

        <div class="col fs-6 text-secondary translate py-1 1bb">Understand</div>
        <div class="col fs-2 english py-1"></div>
        <div class="col fs-5 sentence py-1"></div> 
        <div class="col id_words py-1" style="display: none;"></div><!-- Tech -->
        <div class="position-absolute top-0 start-0 fs-6 text-secondary mt-2 ms-3"><span></span>.</div>
        
    </div>
    <!-- /New card -->

    <!-- Card add new words -->
    <div class="b1b fs-1 text-center" id="textAdd"
         style="margin-top:220px; font-family: Sofia, sans-serif; display: none;">
            <button class="btn btn-link fs-2 text-decoration-none text-black"
                    data-bs-toggle="modal"
                    data-bs-target="#mod_add_words">
                    Create your first card ...
            </button>
    </div>
    <!-- Card add new words -->

    <div id="insCard" class="fs-2 my-2"></div><!-- Insert card -->
   
</div>
<!-- /body -->

<!-- footer -->
<div style="height: 75px;"></div>


<div class="fixed-bottom mx-auto me-2 1bb text-center" style="max-width: 60px; height: 135px">

    <button type="button"
            id="butMode" 
            class="btn btn-outline-secondary rounded-5 opacity-50 py-1"
            1style="margin: 0 21px 0 auto;"
            onclick="mode(1)">
            <i class="bi bi-mortarboard 1text-secondary f1s-1" style="font-size: 28px"></i>   
        </button>
</div>

<div class="container fixed-bottom col-12 mx-auto" style="max-width: 1000px;">
    <div id="butBottom" class="bg-light row rounded-4">
        <div class="col-4 text-center">
            <button type="button"
                    class="btn btn-link text-decoration-none text-secondary 1py-0 1my-0"
                    id="back">
                <i class="bi bi-caret-left fs-5"></i>
                    <div style="font-size: 14px">Back</div>
            </button>
        </div>
        <div class="col-4 text-center">     
            <button type="button"
                        class="btn btn-link text-decoration-none text-secondary"
                        style="margin-top:7px"
                        data-bs-toggle="modal"
                        data-bs-target="#mod_add_words">
                    <i class="bi bi-plus-lg fs-2"></i>
            </button>
        </div>
        <div class="col-4 text-center">
            <button type="button"
                    class="btn btn-link text-decoration-none text-secondary 1py-0 1my-0"
                    id="next">
                <i class="bi bi-caret-right fs-5"></i>
                    <div style="font-size: 14px">Next</div>
            </button>
        </div>
    </div>
</div>
<!-- /footer -->
{% endblock %}

{% block modal %}
{{ include('mod/mod_add_words.php') }}
{{ include('mod/mod_edit_words.php') }}
{{ include('mod/mod_category_add.php') }}
{{ include('mod/mod_category_del.php') }}
{{ include('mod/mod_review.php') }}
{{ include('mod/mod_review_ok.php') }}
{{ include('mod/mod_about.php') }}
{{ include('mod/mod_shortcut.php') }}
{% endblock %}

{% block js %}
<script type="text/javascript">
{{ include('js/words.js') }}
{{ include('js/mod_entry.js') }}
{{ include('js/mod_review.js') }}
{{ include('js/mod_about.js') }}
</script>
{% endblock %}