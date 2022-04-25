
<style type="text/css">
	h2 { font-family: calibri; color: #2a3342;  }
</style>

<div style=""> <!-- main Div -->

	<div style="margin: 50px auto; color: #2a3342; border:7px solid #eee; ">

		<div style=" padding: 20px 0 20px 0;">
					 
  
  
			<img src="{{asset($logo->img_path)}}" width="200px;" style="display: block; margin-left: auto; margin-right: auto;">

			<div style="width: 20%; height: 1px; background-color: #68b7a4; margin: 10px auto 10px auto;"></div>

		</div>

		<br><br>

		<div style="padding: 0 40px 20px 40px;"> 
		<h2 style="font-size: 16px; font-weight: inherit;">Dear {{$data['name']}}! We are sorry! Your request has been rejected </h2><br>
		<p style="font-size: 16px; font-weight: inherit;">{{$data['Email']}}</p>
		</div>

		<br><br>


	</div>

</div>