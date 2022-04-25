
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form method="POST" action="{{route('MailSend')}}">
	@csrf
	<h3>Test email </h3>
	<input type="emai" name="inquiries_email">
	<button>Submit</button>
</form>


</body>
</html>


