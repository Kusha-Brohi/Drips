
<style type="text/css">
	h2 { font-family: calibri; color: #2a3342;  }
</style>

<div style=""> <!-- main Div -->

	<div style="margin: 50px auto; color: #2a3342; border:7px solid #eee; ">

		<div style=" padding: 20px 0 20px 0;">
					 
  
  
			<img src="{{asset('images/newlogo.jpg')}}"  style="display: block; margin-left: auto; margin-right: auto;">

			<div style="width: 20%; height: 1px; background-color: #68b7a4; margin: 10px auto 10px auto;"></div>

		</div>

		<br><br>

		<div style="padding: 0 40px 20px 40px;"> 
		<h2 style="font-size: 16px; font-weight: inherit;">Dear <b>{{$emaildata['name']}}</b>! You have an upcoming appointment with  <b>{{$emaildata['patientname']}}</b> on <b>{{$emaildata['date']}}</b> at <b>{{$emaildata['timing']}}</b>. The appointment type is <b>{{$emaildata['booking_type']}}</b>.</h2>
		<p style="font-size: 16px; font-weight: inherit;">send zoom meeting link to patient's email: <b>{{$emaildata['patientemail']}}</b></p>
		<p style="font-size: 16px; font-weight: inherit;">Please click the below link and view ECC card!</p>			
		<p style="font-size: 16px; font-weight: inherit;">Link: {{$url}}</p>
	<!--	<p style="font-size: 16px; font-weight: inherit;">Email: {{$doctor_data['email']}}</p>-->

	
		</div>

		<br><br>


	</div>

</div>