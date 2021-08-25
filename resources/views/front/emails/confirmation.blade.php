<!DOCTYPE html>
<html>
<head>
	<title>Email Varification</title>
</head>
<body>
<table>
	<tr><td>Dear {{$name}}</td></tr>
	<tr><td>Please click on below link to activate your account.<br> </td></tr>
	<tr><td><a href="{{url('confirm/'.$code)}}">Verify Email</a></td></tr>
	<tr><td>Thanks & Regards,</td></tr>
	<tr><td>Shopping or Shopping Website</td></tr>
</table>
</body>
</html>