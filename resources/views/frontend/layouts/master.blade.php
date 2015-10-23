<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <title>page title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap -->
    <link href="{{url("css/metro-bootstrap.css")}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <style>
        .nav.navbar-nav a.btn.btn-sm.btn-warning {
            color: white;
            margin: 0px;
            padding: 10px 20px 10px;
            margin-top: 10px;
        }
        .nav.navbar-nav a.btn.btn-sm.btn-warning:hover {
            background: rgba(255, 152, 0, 0.43);
        }

        .nav.navbar-nav .active {
            color: #e51c23 !important;
            font-weight: bold;
        }
    </style>
</head>
<body>

@if (access()->can('manage_hospital'))
    @include('frontend.includes.manager-header-nav')
@elseif (access()->can('give_recommendations'))
    @include('frontend.includes.doc-header-nav')
@else
    @include('frontend.includes.header-nav')
@endif
<div class="container">
    <div class="col-sm-12" style="margin-top: 85px; ">
        @include('includes.partials.messages')
        @yield("content")
    </div>

</div>
<footer class="footer" style="text-align:center; background-color:black; font-size:1.5rem; height:50px;width: 100%;bottom: 0">
    <p >(c) Ikorodu General Hospital</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="{{ url('js/jquery.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ url('js/bootstrap.js') }}"></script>

@yield('after-scripts-end')
<script>
    $('#view_profile_tab').click(function (e) {
        e.preventDefault()
        $('#tabs li:eq(1) a').tab('show')
    })
</script>

</body>
</html>