<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <title>page title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{url("css/metro-bootstrap.css")}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
</head>
<body>
@include('frontend.includes.header-nav')

<div class="container">
    <div class="col-sm-12" style="margin-top: 85px; min-height: 550px">
        @yield("content")
    </div>

</div>
<footer class="footer" style="text-align:center; background-color:black; font-size:2rem; height:50px;">
    <p >...</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="{{ url('js/jquery.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ url('js/bootstrap.js') }}"></script>

<script>
    $('#view_profile_tab').click(function (e) {
        e.preventDefault()
        $('#tabs li:eq(1) a').tab('show')
    })
</script>
</body>
</html>