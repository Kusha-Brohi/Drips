
<div class="container">


	<!-- <br/> -->
	<!-- <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a> -->


	<img src="{{asset('images/Drips-LabTestRequestForm.jpg')}}" style="width: 700px;">


	<!-- <div style="background-image: url('{{asset('images/prescription.jpg')}});"> -->
											<?php
                                            $date = date('j F, Y', strtotime($data['DOB']));
                                           // dd($date);
                                            ?>
	<h3 style='position: absolute;margin-top: 190px;margin-left: -465px;'>{{ucfirst($data['name'])}}</h3>
	<h3 style='position: absolute;margin-top: 245px;margin-left: -160px;'>DMS-00{{ucfirst($data['MRN'])}}</h3>
	<h3 style='position: absolute;margin-top: 245px;margin-left: -510px;'>{{ucfirst($date)}}</h3>
	<!-- <h3 style='position: absolute;margin-top: 385px;margin-left: -260px;'>{{ucfirst($data['Diagnosis'])}}</h3> -->
	<!-- <h3 style='position: absolute;margin-top: 320px;margin-left: -565px;'>{{ucfirst($data['sex'])}}</h3> -->
			
<!--<h3 style='position: absolute;margin-top: 320px;margin-left: -260px;'>{{ucfirst($allergies[0])}}</h3>-->
			<?php
               $allergies = json_decode($data['allergies']);
                              ?>
			
<!-- 	<h3 style='position: absolute;margin-top: 320px;margin-left: -260px;'>
	
		@foreach($allergies as $key => $value)
          @if($value == yes)
		
		@else
		{{ucfirst($value)}}
		@endif
		@endforeach
		
	</h3> -->

	<h3 style='position: absolute;margin-top: 930px;margin-left: -150px;'>{{$data['date']}}</h3>

	<h3 style='position: absolute;margin-top:780px;margin-left: -525px;'>Dr.{{ucfirst($data['doc_name'])}}</h3>
	<h3 style='position: absolute;margin-top: 820px;margin-left: -525px;'>{{ucfirst($data['mdcn'])}}</h3>

<table style='position: absolute;margin-top: 400px; left:0;width: 100%;'>
		<tr>
         
			<th>S.no</th>  
			<th>Order</th>
			<th>Note</th>
		</tr>
			 @php
        $i = 0;
        @endphp
		@foreach ($data['items'] as $key => $item)
		 @php
       $i++;
       @endphp
		<tr>
        	<td>{{ $i }}</td>  
			<td>{{ucfirst($item->text) }}</td>
			<td>{{ucfirst($item->ordernote) }}</td>
			

		</tr>
		@endforeach
	</table> 
</div>
</div>
<style>
table {
  border-collapse: collapse;

}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
