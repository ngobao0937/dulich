<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>ADMIN</title>
<link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('images/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/toastr/toastr.min.css') }}">
<style>
    .image-upload-container {
        position: relative;
        display: inline-block;
        width: 165px;
        height: 175px;
        overflow: hidden;
        cursor: pointer;
        justify-content: flex-start;
        align-content: center;
    }

    .image-upload-container input{
        display: none;
    }

    .preview-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 1px solid gainsboro;
    }

    .upload-icon, .remove-icon {
        position: absolute;
        background: white;
        color: #7e7e7e;
        padding: 5px;
        border-radius: 50%;
        cursor: pointer;
        width: 25px;
        height: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); /* Thêm bóng */
    }

    .upload-icon:hover, .remove-icon:hover{
        color: var(--primary);
    }

    .upload-icon {
        top: 3px;
        right: 3px;
    }

    .remove-icon {
        bottom: 3px;
        right: 3px;
    }

    /* .card .card-header{
        margin-right: -.625rem; 
        margin-left: -.625rem;
    } */
    

    .card .card-header .div-header{
        margin-right: -.625rem !important; 
        margin-left: -.625rem !important;
    }
    .select2{
        width: 100% !important;
    }
    .select2-container .select2-selection--single{
        height: 38px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 5px !important;
    }

    .card-link:hover span{
        color: #7e7e7e !important;
    }
    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da
    }
</style>
