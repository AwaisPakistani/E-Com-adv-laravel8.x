<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   @if(!empty($meta_title))
   <title>{{$meta_title}}</title>
   @else
   <title>Laravel E-Com Website</title>
   @endif

   @if(!empty($meta_description))
   <meta name="description" content="{{$meta_description}}">
   @else
   <meta name="description" content="It's Shopping Website">
   @endif
   @if(!empty($meta_keywords))
   <meta name="keywords" content="{{$meta_keywords}}">
   @else
   <meta name="keywords" content="Shopping website, E-Com Website">
   @endif

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{url('front/css/bootstrap.min.css')}}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{url('front/css/slick.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{url('front/css/slick-theme.css')}}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{url('front/css/nouislider.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{url('front/css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{url('front/css/style.css')}}" />
	<style  type="text/css" rel="stylesheet">
    form.cmxForm .error, label.error{

		color:red;
	}
	</style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Bootstrap -->

</head>

<body>
	


    <!-- Header-->
	@include('layouts.frontLayout.front_header');
    <!-- /Header-->
    <!-- Sidebar-->
    @include('layouts.frontLayout.front_sidebar');
    <!-- /Sidebar-->
    @yield('content')

	<!-- FOOTER -->
	@include('layouts.frontLayout.front_footer');
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
    <script src="{{url('front/js/jquery.min.js')}}"></script>
	<script src="{{url('front/js/bootstrap.min.js')}}"></script>
	<script src="{{url('front/js/slick.min.js')}}"></script>
	<script src="{{url('front/js/nouislider.min.js')}}"></script>
	<script src="{{url('front/js/jquery.zoom.min.js')}}"></script>
	<script src="{{url('front/js/main.js')}}"></script>
	<script src="{{url('front/js/front.js')}}"></script>
	
    <script src="{{url('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{url('plugins/jquery-validation/additional-methods.min.js')}}"></script>
	<script type="text/javascript">

     $(document).ready(function () {
        /*$.validator.setDefaults({
        submitHandler: function () {
         alert( "Form successful submitted!" );
        }
        });*/
    $('#login-form').validate({
      rules: {
            email: {
                  required: true,
              email: true,
            },
            password: {
                  required: true,
                  minlength: 8
            },
            terms: {
                  required: true
            },
        },
        messages: {
             email: {
             required: "Please enter an email address",
             email: "Please enter a vaild email address"
            },
            password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
            },
            terms: "Please accept our terms"
        },
        errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
	$('#register-form').validate({
      rules: {
		name:"required",
        email: {
        required: true,
        email: true,
		remote: "/check-email"
        },
		mobile: {
        required: true,
        minlength: 11,
		digits: true
        },
        password: {
        required: true,
        minlength: 8
        },
        terms: {
        required: true
        },
        },
        messages: {
		name:"Please enter your name...",
        email: {
        required: "Please enter an email address",
        email: "Please enter a vaild email address",
		remote:"Email already Exists"
        },
		mobile: {
        required: "Please provide a Mobile number",
        minlength: "Your mobile number must be at least 11 characters long",
		digits: "Please enter numeric letters just"
        },
        password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
        },
        terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
     }
    });
    $('#update-account-form').validate({
            rules: {
            name:"required",
            email: {
              required: true,
              email: true,
            },
            mobile: {
              required: true,
              minlength: 11,
              digits: true
            },
            },
            messages: {
             name:{
                required: "Please enter your name...",
                },
             email: {
             required: "Please enter an email address",
             email: "Please enter a vaild email address"
             },
               mobile: {
               required: "Please provide a Mobile number",
               minlength: "Your mobile number must be at least 11 characters long",
               digits: "Please enter numeric letters just"
               },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
    });
    $('#update-password-form').validate({
      rules: {
            current_password: {
                  required: true,
                  minlength: 8,
                  maxlength: 20
            },
            new_password: {
                  required: true,
                  minlength: 8,
                  maxlength: 20
            },
            confirm_password: {
                  required: true,
                  minlength: 8,
                  maxlength: 20,
                  equalTo: '#new_password'
            },
        },
        messages: {
            current_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long",
            maxlength: "Your password must be equal or less than 20 characters long"
            },
            new_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long",
            maxlength: "Your password must be equal or less than 20 characters long"
            },
            confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long",
            maxlength: "Your password must be equal or less than 20 characters long"
            }
            
        },
        errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });


    
});
</script>


</body>

</html>
