@extends('layouts.main')
@section('content')

    
    <!-- Begin: Crousel -->
    <div class="main-slider">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
		@foreach($banner as $loop)
          <li data-target="#carousel-example-generic" data-slide-to="{{$loop->index}}" class="active"></li>
		  @endforeach
         <!-- <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
           <li data-target="#carousel-example-generic" data-slide-to="3"></li>-->
        </ol>
        <!-- Wrapper for slides -->
		
        <div class="carousel-inner" role="listbox">
		<?php $counter=0; ?>
				 @foreach($banner as $key => $value)
		
          <div class="item {{$counter == 0 ? 'active' :''}}"">
            <img src="{{asset($value->image)}}" alt="...">
            <div class="carosal-cap" style="color: #fff">
			<?=html_entity_decode($value->description)?>
          
            </div>
          </div>

		  <?php $counter++?>
		  @endforeach
        </div>
		
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
      </div>
    </div>


    <section class="drip-sec">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <div class="abt-img">
              <img src="{{asset($cms_home1->image)}}">
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
           <?=html_entity_decode($cms_home1->content)?>
            <div class="drip-sign">
              <h3>SIGN UP FOR </h3>
              <h4>DRIPS NOW</h4>
              <p>Available Nationwide, Anytime, Anywhere</p>
            </div>
          </div>
        </div>
      </div>
    </section>




    <section class="electronic">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 shadow-elec">
            <div class="col-md-5">
              <img src="{{asset($cms_home2->image)}}">
            </div>
            <div class="col-md-7">
              <div class="electronic-txt">
                <h3>{{$cms_home2->name}}</h3>
				<?=html_entity_decode($cms_home2->content)?>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 shadow-elec">
            <div class="col-md-5">
              <img src="{{asset($cms_home3->image)}}">
            </div>
            <div class="col-md-7">
              <div class="electronic-txt">
               <h3>{{$cms_home3->name}}</h3>
				<?=html_entity_decode($cms_home3->content)?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




    <section class="see-drip">
      <div class="container">
        <div class="row">
          <div class="see-drip-txt">
           <?=html_entity_decode($cms_home4->content)?>
            <a href=""> Learn More</a>
          </div>
        </div>
      </div>
    </section>
     <section class="see-drip no-wait">
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
          <div class="see-drip-txt no-wait-txt">
           <?=html_entity_decode($cms_home5->content)?>
            <a href=""> Learn More</a>
          </div>
          </div>
        </div>
      </div>
    </section>




    <section class="changing">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="changing-txt">
              <?=html_entity_decode($cms_home6->content)?>
              <a href="">Learn More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="changing-img">
              <img src="{{asset($cms_home6->image)}}">
            </div>
          </div>
        </div>
      </div>
    </section>




    <section class="commonly">
      <div class="container">
        <div class="commonly-head">
          <h4>COMMONLY TREATED CONDITIONS</h4>
          <p>Listed below are some of the common conditions we treat</p>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-3">
            <div class="commonly-list">
              <ul>
                <li><a href="">Acid Reflux</a></li>
                <li><a href="">Allergies</a></li>
                <li><a href="">Asthma</a></li>
                <li><a href="">Asthma</a></li>
                <li><a href="">Bronchitis</a></li>
                <li><a href="">Cold & Flu</a></li>
              </ul>
            </div>
          </div>
         <div class="col-xs-6 col-md-3">
            <div class="commonly-list">
              <ul>
                <li><a href="">Constipation</a></li>
                <li><a href="">Diarrhea</a></li>
                <li><a href="">Diabetes</a></li>
                <li><a href="">Fungal Infections</a></li>
                <li><a href="">Gout</a></li>
                <li><a href="">Headache</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-6 col-md-3">
            <div class="commonly-list">
              <ul>
                <li><a href="">Heartburn</a></li>
                <li><a href="">Hemorrhoids</a></li>
                <li><a href="">High Blood Pressure</a></li>
                <li><a href="">Infections</a></li>
                <li><a href="">Nausea</a></li>
                <li><a href="">Rashes</a></li>
              </ul>
            </div>
          </div>
         <div class="col-xs-6 col-md-3">
            <div class="commonly-list">
              <ul>
                <li><a href="">Sinus Conditions</a></li>
                <li><a href="">Sore Throat</a></li>
                <li><a href="">Thyroid Conditions</a></li>
                <li><a href="">Urinary Tract Infection</a></li>
                <a href="">And More!</a>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection