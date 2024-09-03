{% extends "base.php" %}

{% block body %}
<!-- header -->
<div class="container sticky-top 1bg-white" 1style="max-width: 800px;">

    <div class="row justify-content-between mt-3 trainMode" id="menu">
        
        <div class="col-auto ps-2" style="padding-top: 5px">
            <a href="https://dov.pp.ua/english-cards/" class="text-decoration-none text-black">
                <h5><i class="bi bi-copy pe-2"></i>English Cards</h5>
            </a>
        </div>

        <div class="col-auto">
            <button type="button"
                    class="btn btn-outline-dark 1border-0 1border-secondary 1text-primary 1bb
                    text-decoration-none 1fs-5 1bb"
                    data-bs-toggle = "modal"
                    data-bs-target = "#mod_about">About
            </button>
        
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"><b>{{ email }}</b></a></li>
                    <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" onclick="butEnd()">Sign out</a></li>
            </ul>
        </div>

    </div>

</div>
<!-- /header -->

<!-- body -->
<div class="vertical-center text-center mt-3">
    <div class="col-12">
        <div class="col mt-4 fs-2" style="font-family: Sofia, sans-serif;">
        Сreate your own cards with words, phrases or sentences ...<br>
        <span class="fs-5">Free for everyone</span>
        </div>   
    </div>
</div>
<!-- /body -->

<!-- footer -->
<div class="container fixed-bottom 1bb pb-3 1bb mx-auto" style="max-width: 500px">
    <div class="1mx-auto 1bb mx-2">

    <button type="button"
                class="btn btn-outline-dark col-12 fs-5 rounded-5 py-2"
                data-bs-toggle = "modal"
                data-bs-target = "#mod_entry"
                onclick = "pressLogin()">
                Sign in
        </button>

    </div>

    <div class="mx-2 mt-3 mb-2 1bb">
    <button type="button"
                class="btn btn-dark  col-12 fs-5 rounded-5 py-2"
                data-bs-toggle = "modal"
                data-bs-target = "#mod_entry"
                onclick = "pressReg()">
                Registration
        </button>
    </div>

    <a class="text-decoration-none text-black" href="https://www.linkedin.com/in/danyshevskyi/" target="blank"> 
    <div class="text-center mt-3" style="font-size: 13px;">Oleksii Danyshevskyi &copy; 2024 
       
    <i class="bi bi-linkedin"></i></div>
    </a>
</div>
<!-- /footer -->
{% endblock %}

{% block modal %}
{{ include('mod/mod_entry.php') }}
{{ include('mod/mod_about.php') }}
{% endblock %}

{% block js %}
<script type="text/javascript">
{{ include('js/mod_entry.js') }}
</script>
{% endblock %}