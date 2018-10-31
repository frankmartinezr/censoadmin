<style type="text/css" media="screen,projection">

    .input-field .prefix.active { 
        color: <?= $color ?> !important;
    }

    input:focus + label {
        color: <?= $color ?> !important;
    }

    input:focus {
        border-bottom: 1px solid <?= $color ?> !important;
        box-shadow: 0 1px 0 0 <?= $color ?> !important;
    }

    textarea.materialize-textarea:focus:not([readonly]) {
        border-bottom: 1px solid <?= $color ?> !important;
        box-shadow: 0 1px 0 0 <?= $color ?> !important;
    }

    textarea.materialize-textarea:focus:not([readonly])+label {
        color: <?= $color ?> !important;
    }

    ul.dropdown-content.select-dropdown li span {
    color: <?= $color ?> !important;
    }

    .dropdown-content li>a, .dropdown-content li>span {
        color: <?= $color ?> !important;
    }

    .switch label input[type=checkbox]:checked+.lever {
        background-color: <?= $color ?> !important;
    }

    .switch label input[type=checkbox]:checked+.lever:after {
        background-color: #eceff1 !important;
    }

    [type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:after {
        background-color: <?= $color ?> !important;
    }

    [type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:before, [type="radio"].with-gap:checked+label:after {
        border: 2px solid <?= $color ?> !important;
    }

    [type="checkbox"]:checked+label:before {
        border-right: 2px solid <?= $color ?> !important;
        border-bottom: 2px solid <?= $color ?> !important;
    }

    [type="checkbox"].filled-in:checked+label:after {
        border: 2px solid <?= $color ?> !important;
        background-color: #ffffff !important;
    }
    
    table.dataTable thead th, table.dataTable thead td {
        border-bottom: none !important;
        background-color: <?= $color ?> !important;
        color: white !important;
        font-weight: 500 !important;
    }

    .picker__date-display {
        background-color: <?= $color ?> !important;
    }

    .picker__day--selected {
        background-color: <?= $color ?> !important;
    }

    .picker__close, .picker__today {
        color: <?= $color ?> !important;
    }
    /* estilos pickertime */
    .clockpicker-canvas line {
        stroke: <?= $color ?> !important;
    }

    .clockpicker-canvas-bg {
        fill: <?= $color ?> !important;
    }

    .clockpicker-canvas-bearing {
        fill: <?= $color ?> !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: <?= $color ?> !important;
        border: none !important;
        font-weight: bold !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        border: none !important;
        background: <?= $color ?> !important;
        font-weight: bold !important;
    }

    .waves-effect.waves-sipaa .waves-ripple {
        background-color: <?= $color ?>;
    }

    div.nameTag > ul.indicators {
        height: 45px !important;
    }

    .userTag {
        margin: 0px; 
        height: 75px; 
        opacity: 0.98;
    }

    .userView:hover {
        opacity: 0.5;
    }

</style>