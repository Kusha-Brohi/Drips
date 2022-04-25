
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
		
		<h2 style="font-size: 16px; font-weight: inherit;">Dear <b>{{$eccemail['name']}}</b>,</h2>
		<p style="font-size: 16px; font-weight: inherit;">You have paid ₦{{$eccemail['amount']}} for <b>ECC Card </b> Now you can book your Appointment via your dashboard</p>
		<p style="font-size: 16px; font-weight: inherit;">We value our patients greatly and ask you to please feel free to continue to provide feedback about our services. If you have any further questions or would like to discuss this matter further, you’re more than welcome and encouraged to do so.</h2>
		<p style="font-size: 16px; font-weight: inherit;">We thank you for your invaluable support</p>			
		
	<!--	<p style="font-size: 16px; font-weight: inherit;">Email: {{$doctor_data['email']}}</p>-->

	
		</div>

		<br><br>


	</div>

</div>