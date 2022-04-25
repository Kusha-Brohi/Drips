
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
		<h2 style="font-size: 16px; font-weight: inherit;">Dear {{$doctor_data_Updated['name']}}! Your portal account has been updated successfully please login to your acccount</h2>
		<p style="font-size: 16px; font-weight: inherit;">Following are the credentials of your account</p>
		<p style="font-size: 16px; font-weight: inherit;">Link:https://dripsmedical.com/portal/physician-dashboard/PhysicianLogin</p>
	<!--	<p style="font-size: 16px; font-weight: inherit;">Email: {{$doctor_data['email']}}</p>-->
		<p style="font-size: 16px; font-weight: inherit;">MDCN: {{$doctor_data_Updated['MDCN']}}</p>
		<p style="font-size: 16px; font-weight: inherit;">Password: {{$doctor_data_Updated['password']}}</p>
	
		</div>

		<br><br>


	</div>

</div>