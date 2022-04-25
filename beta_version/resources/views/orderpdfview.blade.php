
<div class="container">


	<!-- <br/> -->
	<!-- <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a> -->


	<img src="{{asset('images/prescription.jpg')}}" style="width: 700px;">


	<!-- <div style="background-image: url('{{asset('images/prescription.jpg')}});"> -->
											<?php
                                            $date = date('j F, Y', strtotime($data['DOB']));
                                           // dd($date);
                                            ?>
	<h3 style='position: absolute;margin-top: 250px;margin-left: -565px;'>{{ucfirst($data['name'])}}</h3>
	<h3 style='position: absolute;margin-top: 250px;margin-left: -260px;'>DMS00{{ucfirst($data['MRN'])}}</h3>
	<h3 style='position: absolute;margin-top: 285px;margin-left: -565px;'>{{ucfirst($date)}}</h3>
	<h3 style='position: absolute;margin-top: 285px;margin-left: -260px;'>{{ucfirst($data['Diagnosis'])}}</h3>
	<h3 style='position: absolute;margin-top: 320px;margin-left: -565px;'>{{ucfirst($data['sex'])}}</h3>
			
<!--<h3 style='position: absolute;margin-top: 320px;margin-left: -260px;'>{{ucfirst($allergies[0])}}</h3>-->
			<?php
               $allergies = json_decode($data['allergies']);
                              ?>
			
	<h3 style='position: absolute;margin-top: 320px;margin-left: -260px;'>
	
		@foreach($allergies as $key => $value)
          @if($value == yes)
		
		@else
		{{ucfirst($value)}}
		@endif
		@endforeach
		
	</h3>



	<h3 style='position: absolute;margin-top: 830px;margin-left: -110px;'>{{$data['date']}}</h3>

	<h3 style='position: absolute;margin-top: 740px;margin-left: -540px;'>{{ucfirst($data['doc_name'])}}</h3>
	<h3 style='position: absolute;margin-top: 770px;margin-left: -540px;'>{{ucfirst($data['mdcn'])}}</h3>

<table style='position: absolute;margin-top: 500px; margin-left: -590px;'>
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
