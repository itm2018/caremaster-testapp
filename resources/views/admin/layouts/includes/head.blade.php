<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CareMaster Admin | Companies</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet"
      href="{{asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('admin-lte/dist/css/adminlte.min.css')}}">
<style>
    .action-btn {
        display: flex;
        height: 1.5rem;
        width: 1.5rem;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 0.25rem;
        border-width: 1px;
        --tw-border-opacity: 1;
        border-color: rgb(226 232 240);
    }

    .inline-block {
        display: inline-block;
    }

    button, [role="button"] {
        cursor: pointer;
    }

    button, [type='button'], [type='reset'], [type='submit'] {
        -webkit-appearance: button;
        /*background-color: transparent;*/
        background-image: none;
    }

    button, select {
        text-transform: none;
    }

    button, input, optgroup, select, textarea {
        font-family: inherit;
        font-size: 100%;
        font-weight: inherit;
        line-height: inherit;
        color: inherit;
        margin: 0;
        padding: 0;
    }

    .flex button {
        box-sizing: border-box;
        border-width: 2px;
        border-style: solid;
        border-color: #E5E7EB;
        margin-inside: 2px;
    }

    .flex button.view {
        color: #0000FF;
    }

    .flex button.edit {
        color: #00b44e;
    }

    .flex button.remove {
        color: #ec4844;
    }

    .flex span.distance {
        margin-outside: 1 pm;
    }
    .logoImg{
        width: 100px;
        height: 100px
    }
    #logoImg{
        width: 200px;
        height: 200px
    }
</style>
