@extends('front-end.layouts.master')

@section('content')
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Exhibitor List</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Exhibitor List</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->   

    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Valuable <span>Exhibitors</span></h3>
            </div>
            <div class="row">
                <?php /* @foreach($exhibitors as $exhts)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="image-holder text-center">
                        <div class="image-box">
                            <figure>
                                <img src="{!! asset('public/uploads/exibitiors-logo/'.$exhts->logo) !!}" alt="">
                            </figure>
                                                                                
                        </div>
                        <div class="image-content">
                            <a href="{{URL::to('exhibitor/exhibitor-details-profile/'.$exhts->id)}}" target="_blank"><h5>{{$exhts->company_name}}</h5></a>
                            <span><!-- <a href="{!! url($exhts->website) !!}" target="_blank" style="text-align: center;"> -->{{$exhts->website}}<!-- </a> -->
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach */?>
	<style>
	table.exb_table_list td {
		border: 1px solid #c3c3c3;
		padding: 0 5px 0 20px;
	}
	
	</style>

 <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><strong>LIST OF EXHIBITORS - ALPHABETICAL ORDER</strong></a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><strong>LIST OF EXHIBITORS - ALPHABETICAL ORDER (HALL WISE)</strong></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
	
	<div class="table-responsive">		
<table style='border-collapse: collapse;width:100%'  class='exb_table_list'>
 <col width=28 style='mso-width-source:userset;mso-width-alt:1024;width:21pt'>
 <col class=xl82 width=218 style='mso-width-source:userset;mso-width-alt:7972;
 width:164pt'>
 <col width=87 style='mso-width-source:userset;mso-width-alt:3181;width:65pt'>
 <col width=48 style='mso-width-source:userset;mso-width-alt:1755;width:36pt'>
 <col width=49 style='mso-width-source:userset;mso-width-alt:1792;width:37pt'>
 <col width=158 style='mso-width-source:userset;mso-width-alt:5778;width:119pt'>
 <col width=158 style='mso-width-source:userset;mso-width-alt:5778;width:119pt'>
<tr height=25 style='height:18.75pt'>
  <td colspan=6 height=25 class=xl74 style='height:18.75pt; text-align: center;    font-weight: 600;' >EXHIBITORS LIST - ALPHABETICAL ORDER</td> 
 </tr>

 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt'>Sl</td>
  <td class=xl65 style='border-left:none'>Name of Company</td>
  <td class=xl65 style='border-left:none'>Country</td>
  <td class=xl70 style='border-left:none'>Stall Qty</td>
  <td class=xl70 style='border-left:none'>Hall No</td>
  <td class=xl70 style='border-left:none'>Stall<span style='mso-spacerun:yes'> 
  </span>Number</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>1</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Abyaad
  Agrocare</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>214</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>2</td>
  <td class=xl65 style='border-top:none;border-left:none'>ACME Laboratories Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>51-58</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>3</td>
  <td class=xl65 style='border-top:none;border-left:none'>Advance Animal
  Science Co Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>173-175</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>4</td>
  <td class=xl65 style='border-top:none;border-left:none'>Advent Pharma Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>202,203</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>5</td>
  <td class=xl65 style='border-top:none;border-left:none'>Adyan Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>186,187</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>6</td>
  <td class=xl65 style='border-top:none;border-left:none'>Agata Feed Mills Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>105,106</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>7</td>
  <td class=xl65 style='border-top:none;border-left:none'>AG-Noble (Bangladesh)
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>77, 78</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>8</td>
  <td class=xl65 style='border-top:none;border-left:none'>Al Madina
  Pharmaceuticals Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>26,27,31,32,37,38</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>9</td>
  <td class=xl65 style='border-top:none;border-left:none'>Aminorich Nutrients
  B.V. Someren</td>
  <td class=xl65 style='border-top:none;border-left:none'>Netherland</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>256,257</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>10</td>
  <td class=xl65 style='border-top:none;border-left:none'>Andres Pintaluba S.A.</td>
  <td class=xl65 style='border-top:none;border-left:none'>Spain</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>246, 247</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>11</td>
  <td class=xl65 style='border-top:none;border-left:none'>Anwar Cement Sheet
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>84,85,86,89,90,91</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>12</td>
  <td class=xl65 style='border-top:none;border-left:none'>Arena Agro</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>234</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>13</td>
  <td class=xl65 style='border-top:none;border-left:none'>Arifs (Bangladesh)
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>65,66,69,70</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>14</td>
  <td class=xl65 style='border-top:none;border-left:none'>Aver Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>148</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>15</td>
  <td class=xl65 style='border-top:none;border-left:none'>Avon Animal Health</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>218, 233</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>16</td>
  <td class=xl65 style='border-top:none;border-left:none'>AWP REVERIE</td>
  <td class=xl65 style='border-top:none;border-left:none'>Italy</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>199</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>17</td>
  <td class=xl65 style='border-top:none;border-left:none'>BAF Premiks</td>
  <td class=xl65 style='border-top:none;border-left:none'>Turkey</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>190</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>18</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Animal
  Husbandry Society (BAHS)</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>250</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>19</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Dairy
  Farmer's Association</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>249</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>20</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Fisheries
  Research Institute</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>193, 194</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>21</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Livestock
  Research Institute</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>195,196</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>22</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Society
  for Safe Food (BSSF)</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>87, 88</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>23</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Veterinary
  Association</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>210</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>24</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Baxter
  Nutrition</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>96,
  97</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>25</td>
  <td class=xl65 style='border-top:none;border-left:none'>Beijing Centre
  Biology Company Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>China</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>254,255,264,265</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>26</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Bengal
  Overseas Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>1,2,7,8</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>27</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Bengal
  Protein &amp; Fat Suppliers Co.</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>5</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>252,253,266,267,268</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>28</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Bengal
  Remedies Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>3,4,5,6</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>29</td>
  <td class=xl65 style='border-top:none;border-left:none'>BIMCO Animal Health
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>157,158</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>30</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bio Care Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>109,110,111,112</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>31</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bio Lab</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>165,166,171,172</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>32</td>
  <td class=xl65 style='border-top:none;border-left:none'>Blue Eye Aquaculture,
  Thailand</td>
  <td class=xl65 style='border-top:none;border-left:none'>Thailand</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>230</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>33</td>
  <td class=xl65 style='border-top:none;border-left:none'>Century Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>43,44,45,46</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>34</td>
  <td class=xl65 style='border-top:none;border-left:none'>Choong Ang Vaccine
  Laboratories Co Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Korea</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>61</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>35</td>
  <td class=xl65 style='border-top:none;border-left:none'>DASF Feed Ingredients</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>231,232</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>36</td>
  <td class=xl65 style='border-top:none;border-left:none'>DELOS IMPEX 96
  srl,<span style='mso-spacerun:yes'> </span></td>
  <td class=xl65 style='border-top:none;border-left:none'>Romania</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>276</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>37</td>
  <td class=xl65 style='border-top:none;border-left:none'>Department of
  Fisheries</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>191,192</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>38</td>
  <td class=xl65 style='border-top:none;border-left:none'>Department of
  Livestock Services</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>197,198</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>39</td>
  <td class=xl65 style='border-top:none;border-left:none'>Dhaka Group</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>24,25,33,34,35,36</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>40</td>
  <td class=xl65 style='border-top:none;border-left:none'>Doctors Agrovet Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>5</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>9,10,21,22,23</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>41</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Dr
  Sagir's Pet Clinic</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>235</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>42</td>
  <td class=xl65 style='border-top:none;border-left:none'>Dream Animal Pharma</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>189</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>43</td>
  <td class=xl65 style='border-top:none;border-left:none'>DVM Practitioners
  Group</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>215</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>44</td>
  <td class=xl65 style='border-top:none;border-left:none'>Elite Engineering</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>248</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>45</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>ELPE
  Labs</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>102</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>46</td>
  <td class=xl65 style='border-top:none;border-left:none'>Energy
  Technology<span style='mso-spacerun:yes'> </span></td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>80,81,82
  83, 92,93,94,95</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>47</td>
  <td class=xl65 style='border-top:none;border-left:none'>Enivet Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>200,201</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>48</td>
  <td class=xl65 style='border-top:none;border-left:none'>Fahat Trade
  International</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>204</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>49</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>FAO</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>288</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>50</td>
  <td class=xl65 style='border-top:none;border-left:none'>Feedtech Engineering
  Limited</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>205</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>51</td>
  <td class=xl65 style='border-top:none;border-left:none'>FHK Fujihira Industry
  Co Ltd. Japan</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Japan</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>104</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>52</td>
  <td class=xl65 style='border-top:none;border-left:none'>Fishtech (BD) Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>115,116,121,122</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>53</td>
  <td class=xl65 style='border-top:none;border-left:none'>Gentry
  Pharmaceuticals Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>15</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>54</td>
  <td class=xl65 style='border-top:none;border-left:none'>Globe Pharmaceuticals
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>107,108,113,114</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>55</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Globion
  India Pvt Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>163,164</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>56</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Guangdong
  VTR Bio-Tech Co., Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>China</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>222,223,228,229</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>57</td>
  <td class=xl65 style='border-top:none;border-left:none'>Ibratas Trading Co</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>123-130</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>58</td>
  <td class=xl65 style='border-top:none;border-left:none'>Imperic International
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>294</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>59</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Incepta
  Pharmaceuticals Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>28,29,30</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>60</td>
  <td class=xl65 style='border-top:none;border-left:none'>Innova Agrovet</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>273, 282</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>61</td>
  <td class=xl65 style='border-top:none;border-left:none'>Integrated Agri
  Nutrition</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>237</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>62</td>
  <td class=xl65 style='border-top:none;border-left:none'>Jayson Agrovet Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>134,135</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>63</td>
  <td class=xl65 style='border-top:none;border-left:none'>JEFO Nutrition Inc.
  Canada</td>
  <td class=xl65 style='border-top:none;border-left:none'>Canada</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>258,259</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>64</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Jiangxi
  Pioneer B-Pharmaceuticals Co Ltd<span style='mso-spacerun:yes'> </span></td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>China</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>238, 239</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>65</td>
  <td class=xl65 style='border-top:none;border-left:none'>JNS Technology</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>133</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>66</td>
  <td class=xl65 style='border-top:none;border-left:none'>Kemin Dairy</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>240,241</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>67</td>
  <td class=xl69 style='border-top:none;border-left:none'>Khan Agro Feed
  Products</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>291,292</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>68</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Komipharm
  International Co Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Korea</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>270,
  271, 272, 283, 284, 285</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>69</td>
  <td class=xl65 style='border-top:none;border-left:none'>Krishi Shilpa
  Poramorsho Kendro</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>274, 275</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>70</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Kuul
  Merchant Limited</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>269,
  286</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>71</td>
  <td class=xl65 style='border-top:none;border-left:none'>Lark Engineering
  Company (India) Pvt Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>211,212,213</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>72</td>
  <td class=xl65 style='border-top:none;border-left:none'>Magazine Stalls</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>236, 251</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>73</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>MAS
  Additives Trading,<span style='mso-spacerun:yes'> </span></td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>289,290</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>74</td>
  <td class=xl65 style='border-top:none;border-left:none'>Model Livestock
  Institute &amp; Veterinary Hospital</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>217</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>75</td>
  <td class=xl65 style='border-top:none;border-left:none'>Monerekho Agro</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>16</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>76</td>
  <td class=xl65 style='border-top:none;border-left:none'>Nasco Agro Products</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>242,243,244,245</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>77</td>
  <td class=xl65 style='border-top:none;border-left:none'>Nature Care Mfg Ind
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>103</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>78</td>
  <td class=xl65 style='border-top:none;border-left:none'>Navana
  Pharmaceuticals Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>39,40,41,42</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>79</td>
  <td class=xl65 style='border-top:none;border-left:none'>Neons Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>131,132</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>80</td>
  <td class=xl65 style='border-top:none;border-left:none'>Novatech Bangladesh
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>262,263</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>81</td>
  <td class=xl65 style='border-top:none;border-left:none'>Nutech Animal Health</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>67,68</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>82</td>
  <td class=xl65 style='border-top:none;border-left:none'>Nutrihealth Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>159-162</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>83</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Nutrivet
  Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>182,183</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>84</td>
  <td class=xl65 style='border-top:none;border-left:none'>One Pharma Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>63,64,71,72,75,76</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>85</td>
  <td class=xl65 style='border-top:none;border-left:none'>Organic Agro Care</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>99</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>86</td>
  <td class=xl65 style='border-top:none;border-left:none'>Oriental Pharma
  Agrovets Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>138,139</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>87</td>
  <td class=xl65 style='border-top:none;border-left:none'>Orion Pharma Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>220,221</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>88</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Padmaja
  Laboratories Pvt Ltd, India</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>136, 137</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>89</td>
  <td class=xl65 style='border-top:none;border-left:none'>Panacia Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>295</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>90</td>
  <td class=xl65 style='border-top:none;border-left:none'>Pharma &amp; Firm</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>59</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>91</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Pharmaraw
  Agrovet</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>101</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>92</td>
  <td class=xl65 style='border-top:none;border-left:none'>Planet Pharma Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>47,48,49,50</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>93</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Popular
  Pharmaceuticals Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>180,181</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>94</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Powertech
  Trading International</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>260, 261</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>95</td>
  <td class=xl65 style='border-top:none;border-left:none'>Pradhikar</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>216</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>96</td>
  <td class=xl65 style='border-top:none;border-left:none'>Provet Resources Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>117,118,119,120</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>97</td>
  <td class=xl65 style='border-top:none;border-left:none'>PVF Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>140-141</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>98</td>
  <td class=xl65 style='border-top:none;border-left:none'>PVS Group</td>
  <td class=xl65 style='border-top:none;border-left:none'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>11,12,13,14,17,18,19,20</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>99</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Radiance
  Animal Health</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>279</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>100</td>
  <td class=xl65 style='border-top:none;border-left:none'>Rals Agro Limited</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>62,73,74</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>101</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Remedy
  Agrovet Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>293</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>102</td>
  <td class=xl65 style='border-top:none;border-left:none'>Sabir Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>79</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>103</td>
  <td class=xl67 style='border-left:none'>Safe Bio Products Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>277,278</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>104</td>
  <td class=xl67 style='border-left:none'>Shinil Biogen Co Ltd</td>
  <td class=xl67 style='border-left:none'>Korea</td>
  <td class=xl73 style='border-left:none'>1</td>
  <td class=xl73 style='border-left:none'>1</td>
  <td class=xl73 style='border-left:none'>60</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>105</td>
  <td class=xl65 style='border-top:none;border-left:none'>Skytech Agro Pharma</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>167, 168, 169, 170</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>106</td>
  <td class=xl65 style='border-top:none;border-left:none'>SMG Animal Health Co.
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>206,207</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>107</td>
  <td class=xl65 style='border-top:none;border-left:none'>Speed Care
  Distribution Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>188</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>108</td>
  <td class=xl65 style='border-top:none;border-left:none'>Sysnova Information
  System Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>219</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>109</td>
  <td class=xl65 style='border-top:none;border-left:none'>Tajarat Animal Care</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>100</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>110</td>
  <td class=xl65 style='border-top:none;border-left:none'>Technology &amp; Agro
  Trading Co Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>176,177,178,179</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>111</td>
  <td class=xl65 style='border-top:none;border-left:none'>Toufique Agro Lab</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>142</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>112</td>
  <td class=xl65 style='border-top:none;border-left:none'>Uni - President
  (Vietnam)</td>
  <td class=xl65 style='border-top:none;border-left:none'>Vietnam</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>208,209</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>113</td>
  <td class=xl65 style='border-top:none;border-left:none'>Uttara Foods &amp;
  Feeds (Bangladesh) Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>287</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>114</td>
  <td class=xl65 style='border-top:none;border-left:none'>Verno Bio Solutions</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>98</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>115</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Victam
  International B.V.</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Netherland</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>296</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>116</td>
  <td class=xl65 style='border-top:none;border-left:none'>Vital BD Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>184</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>117</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Wenger
  Manufacturing Inc.</td>
  <td class=xl65 style='border-top:none;border-left:none'>USA</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>297</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>118</td>
  <td class=xl65 style='border-top:none;border-left:none'>Wilts Marketing Co
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>146,147</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>119</td>
  <td class=xl65 style='border-top:none;border-left:none'>Winning Agro</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>149-156</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>120</td>
  <td class=xl65 style='border-top:none;border-left:none'>Wiseman Guidance</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>143,144,145</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>121</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Xinxiang
  Hexie Animal Pharmaceuticals Company Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>China</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>280, 281</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>122</td>
  <td class=xl65 style='border-top:none;border-left:none'>Zaker Dairy Farm</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>185</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>123</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Zhejiang
  Esigma Biotechnology Co Ltd<span style='mso-spacerun:yes'> </span></td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>224,225,226,227</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=28 style='width:21pt'></td>
  <td width=329 style='width:247pt'></td>
  <td width=78 style='width:59pt'></td>
  <td width=57 style='width:43pt'></td>
  <td width=60 style='width:45pt'></td>
  <td width=150 style='width:113pt'></td>
 </tr>
 <![endif]>
 
</table>
</div>
	
	
	
	</div>
    <div role="tabpanel" class="tab-pane" id="profile">
	
	<div class="table-responsive">		
<table style='border-collapse: collapse;width:100%'  class='exb_table_list'>
 <col width=28 style='mso-width-source:userset;mso-width-alt:1024;width:21pt'>
 <col class=xl82 width=218 style='mso-width-source:userset;mso-width-alt:7972;
 width:164pt'>
 <col width=87 style='mso-width-source:userset;mso-width-alt:3181;width:65pt'>
 <col width=48 style='mso-width-source:userset;mso-width-alt:1755;width:36pt'>
 <col width=49 style='mso-width-source:userset;mso-width-alt:1792;width:37pt'>
 <col width=158 style='mso-width-source:userset;mso-width-alt:5778;width:119pt'>
 <col width=158 style='mso-width-source:userset;mso-width-alt:5778;width:119pt'>
<tr height=25 style='height:18.75pt'>
  <td colspan=6 height=25 class=xl74 style='height:18.75pt; text-align: center;    font-weight: 600;' >EXHIBITORS LIST - ALPHABETICAL ORDER</td> 
 </tr>

 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt'>Sl</td>
  <td class=xl65 style='border-left:none'>Name of Company</td>
  <td class=xl65 style='border-left:none'>Country</td>
  <td class=xl70 style='border-left:none'>Stall Qty</td>
  <td class=xl70 style='border-left:none'>Hall No</td>
  <td class=xl70 style='border-left:none'>Stall<span style='mso-spacerun:yes'> 
  </span>Number</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>1</td>
  <td class=xl65 style='border-top:none;border-left:none'>ACME Laboratories Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>51-58</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>2</td>
  <td class=xl65 style='border-top:none;border-left:none'>AG-Noble (Bangladesh)
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>77, 78</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>3</td>
  <td class=xl65 style='border-top:none;border-left:none'>Al Madina
  Pharmaceuticals Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>26,27,31,32,37,38</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>4</td>
  <td class=xl65 style='border-top:none;border-left:none'>Anwar Cement Sheet
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>84,85,86,89,90,91</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>5</td>
  <td class=xl65 style='border-top:none;border-left:none'>Arifs (Bangladesh)
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>65,66,69,70</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>6</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Society
  for Safe Food (BSSF)</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>87, 88</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>7</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Bengal
  Overseas Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>1,2,7,8</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>8</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Bengal
  Remedies Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>3,4,5,6</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>9</td>
  <td class=xl65 style='border-top:none;border-left:none'>Century Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>43,44,45,46</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>10</td>
  <td class=xl65 style='border-top:none;border-left:none'>Choong Ang Vaccine
  Laboratories Co Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Korea</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>61</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>11</td>
  <td class=xl65 style='border-top:none;border-left:none'>Dhaka Group</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>24,25,33,34,35,36</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>12</td>
  <td class=xl65 style='border-top:none;border-left:none'>Doctors Agrovet Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>5</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>9,10,21,22,23</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>13</td>
  <td class=xl65 style='border-top:none;border-left:none'>Energy
  Technology<span style='mso-spacerun:yes'> </span></td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>80,81,82
  83, 92,93,94,95</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>14</td>
  <td class=xl65 style='border-top:none;border-left:none'>Gentry
  Pharmaceuticals Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>15</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>15</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Incepta
  Pharmaceuticals Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>28,29,30</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>16</td>
  <td class=xl65 style='border-top:none;border-left:none'>Monerekho Agro</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>16</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>17</td>
  <td class=xl65 style='border-top:none;border-left:none'>Navana
  Pharmaceuticals Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>39,40,41,42</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>18</td>
  <td class=xl65 style='border-top:none;border-left:none'>Nutech Animal Health</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>67,68</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>19</td>
  <td class=xl65 style='border-top:none;border-left:none'>One Pharma Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>63,64,71,72,75,76</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>20</td>
  <td class=xl65 style='border-top:none;border-left:none'>Pharma &amp; Firm</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>59</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>21</td>
  <td class=xl65 style='border-top:none;border-left:none'>Planet Pharma Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>47,48,49,50</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>22</td>
  <td class=xl65 style='border-top:none;border-left:none'>PVS Group</td>
  <td class=xl65 style='border-top:none;border-left:none'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>11,12,13,14,17,18,19,20</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>23</td>
  <td class=xl65 style='border-top:none;border-left:none'>Rals Agro Limited</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>62,73,74</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>24</td>
  <td class=xl65 style='border-top:none;border-left:none'>Sabir Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl71 style='border-top:none;border-left:none'>79</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>25</td>
  <td class=xl65 style='border-top:none;border-left:none'>Shinil Biogen Co Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Korea</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>60</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>26</td>
  <td class=xl65 style='border-top:none;border-left:none'>Agata Feed Mills Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>105,106</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>27</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Baxter
  Nutrition</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>96,
  97</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>28</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bio Care Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>109,110,111,112</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>29</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>ELPE
  Labs</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>102</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>30</td>
  <td class=xl65 style='border-top:none;border-left:none'>FHK Fujihira Industry
  Co Ltd. Japan</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Japan</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>104</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>31</td>
  <td class=xl65 style='border-top:none;border-left:none'>Fishtech (BD) Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>115,116,121,122</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>32</td>
  <td class=xl65 style='border-top:none;border-left:none'>Globe Pharmaceuticals
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>107,108,113,114</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>33</td>
  <td class=xl65 style='border-top:none;border-left:none'>Ibratas Trading Co</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>123-130</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>34</td>
  <td class=xl65 style='border-top:none;border-left:none'>JNS Technology</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>133</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>35</td>
  <td class=xl65 style='border-top:none;border-left:none'>Nature Care Mfg Ind
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>103</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>36</td>
  <td class=xl65 style='border-top:none;border-left:none'>Neons Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>131,132</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>37</td>
  <td class=xl65 style='border-top:none;border-left:none'>Organic Agro Care</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>99</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>38</td>
  <td class=xl65 style='border-top:none;border-left:none'>Oriental Pharma
  Agrovets Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>138,139</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>39</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Padmaja
  Laboratories Pvt Ltd, India</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>136, 137</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>40</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Pharmaraw
  Agrovet</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>101</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>41</td>
  <td class=xl65 style='border-top:none;border-left:none'>Provet Resources Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>117,118,119,120</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>42</td>
  <td class=xl65 style='border-top:none;border-left:none'>Tajarat Animal Care</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>100</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>43</td>
  <td class=xl65 style='border-top:none;border-left:none'>Verno Bio Solutions</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>98</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>44</td>
  <td class=xl65 style='border-top:none;border-left:none'>Wilts Marketing Co
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl71 style='border-top:none;border-left:none'>146,147</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>45</td>
  <td class=xl65 style='border-top:none;border-left:none'>Advance Animal
  Science Co Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>173-175</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>46</td>
  <td class=xl65 style='border-top:none;border-left:none'>Aver Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>148</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>47</td>
  <td class=xl65 style='border-top:none;border-left:none'>BIMCO Animal Health
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>157,158</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>48</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bio Lab</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>165,166,171,172</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>49</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Globion
  India Pvt Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>163,164</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>50</td>
  <td class=xl65 style='border-top:none;border-left:none'>Jayson Agrovet Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>134,135</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>51</td>
  <td class=xl65 style='border-top:none;border-left:none'>Nutrihealth Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>159-162</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>52</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Nutrivet
  Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>182,183</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>53</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Popular
  Pharmaceuticals Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>180,181</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>54</td>
  <td class=xl65 style='border-top:none;border-left:none'>PVF Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>140-141</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>55</td>
  <td class=xl65 style='border-top:none;border-left:none'>Skytech Agro Pharma</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>167, 168, 169, 170</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>56</td>
  <td class=xl65 style='border-top:none;border-left:none'>Technology &amp; Agro
  Trading Co Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>176,177,178,179</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>57</td>
  <td class=xl65 style='border-top:none;border-left:none'>Toufique Agro Lab</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>142</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>58</td>
  <td class=xl65 style='border-top:none;border-left:none'>Winning Agro</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>8</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>149-156</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>59</td>
  <td class=xl65 style='border-top:none;border-left:none'>Wiseman Guidance</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl71 style='border-top:none;border-left:none'>143,144,145</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>60</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Abyaad
  Agrocare</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>214</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>61</td>
  <td class=xl65 style='border-top:none;border-left:none'>Advent Pharma Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>202,203</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>62</td>
  <td class=xl65 style='border-top:none;border-left:none'>Adyan Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>186,187</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>63</td>
  <td class=xl65 style='border-top:none;border-left:none'>Aminorich Nutrients
  B.V. Someren</td>
  <td class=xl65 style='border-top:none;border-left:none'>Netherland</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>256,257</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>64</td>
  <td class=xl65 style='border-top:none;border-left:none'>Andres Pintaluba S.A.</td>
  <td class=xl65 style='border-top:none;border-left:none'>Spain</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>246, 247</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>65</td>
  <td class=xl65 style='border-top:none;border-left:none'>Arena Agro</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>234</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>66</td>
  <td class=xl65 style='border-top:none;border-left:none'>Avon Animal Health</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>218, 233</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>67</td>
  <td class=xl65 style='border-top:none;border-left:none'>AWP REVERIE</td>
  <td class=xl65 style='border-top:none;border-left:none'>Italy</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>199</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>68</td>
  <td class=xl65 style='border-top:none;border-left:none'>BAF Premiks</td>
  <td class=xl65 style='border-top:none;border-left:none'>Turkey</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>190</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>69</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Animal
  Husbandry Society (BAHS)</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>250</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>70</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Dairy
  Farmer's Association</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>249</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>71</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Fisheries
  Research Institute</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>193, 194</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>72</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Livestock
  Research Institute</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>195,196</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>73</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh Veterinary
  Association</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>210</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>74</td>
  <td class=xl65 style='border-top:none;border-left:none'>Beijing Centre
  Biology Company Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>China</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>254,255,264,265</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>75</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Bengal
  Protein &amp; Fat Suppliers Co.</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>5</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>252,253,266,267,268</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>76</td>
  <td class=xl65 style='border-top:none;border-left:none'>Blue Eye Aquaculture,
  Thailand</td>
  <td class=xl65 style='border-top:none;border-left:none'>Thailand</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>230</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>77</td>
  <td class=xl65 style='border-top:none;border-left:none'>DASF Feed Ingredients</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>231,232</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>78</td>
  <td class=xl65 style='border-top:none;border-left:none'>DELOS IMPEX 96
  srl,<span style='mso-spacerun:yes'> </span></td>
  <td class=xl65 style='border-top:none;border-left:none'>Romania</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>276</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>79</td>
  <td class=xl65 style='border-top:none;border-left:none'>Department of
  Fisheries</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>191,192</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>80</td>
  <td class=xl65 style='border-top:none;border-left:none'>Department of
  Livestock Services</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>197,198</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>81</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Dr
  Sagir's Pet Clinic</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>235</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>82</td>
  <td class=xl65 style='border-top:none;border-left:none'>Dream Animal Pharma</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>189</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>83</td>
  <td class=xl65 style='border-top:none;border-left:none'>DVM Practitioners
  Group</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>215</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>84</td>
  <td class=xl65 style='border-top:none;border-left:none'>Elite Engineering</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>248</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>85</td>
  <td class=xl65 style='border-top:none;border-left:none'>Enivet Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>200,201</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>86</td>
  <td class=xl65 style='border-top:none;border-left:none'>Fahat Trade
  International</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>204</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>87</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>FAO</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>288</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>88</td>
  <td class=xl65 style='border-top:none;border-left:none'>Feedtech Engineering
  Limited</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>205</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>89</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Guangdong
  VTR Bio-Tech Co., Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>China</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>222,223,228,229</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>90</td>
  <td class=xl65 style='border-top:none;border-left:none'>Imperic International
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>294</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>91</td>
  <td class=xl65 style='border-top:none;border-left:none'>Innova Agrovet</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>273, 282</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>92</td>
  <td class=xl65 style='border-top:none;border-left:none'>Integrated Agri
  Nutrition</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>237</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>93</td>
  <td class=xl65 style='border-top:none;border-left:none'>JEFO Nutrition Inc.
  Canada</td>
  <td class=xl65 style='border-top:none;border-left:none'>Canada</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>258,259</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>94</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Jiangxi
  Pioneer B-Pharmaceuticals Co Ltd<span style='mso-spacerun:yes'> </span></td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>China</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>238, 239</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>95</td>
  <td class=xl65 style='border-top:none;border-left:none'>Kemin Dairy</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>240,241</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>96</td>
  <td class=xl69 style='border-top:none;border-left:none'>Khan Agro Feed
  Products</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>291,292</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>97</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Komipharm
  International Co Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Korea</td>
  <td class=xl70 style='border-top:none;border-left:none'>6</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>270,
  271, 272, 283, 284, 285</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>98</td>
  <td class=xl65 style='border-top:none;border-left:none'>Krishi Shilpa
  Poramorsho Kendro</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>274, 275</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>99</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Kuul
  Merchant Limited</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>269,
  286</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>100</td>
  <td class=xl65 style='border-top:none;border-left:none'>Lark Engineering
  Company (India) Pvt Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>3</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>211,212,213</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>101</td>
  <td class=xl65 style='border-top:none;border-left:none'>Magazine Stalls</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>236, 251</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>102</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>MAS
  Additives Trading,<span style='mso-spacerun:yes'> </span></td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl74 width=150 style='border-top:none;border-left:none;width:113pt'>289,290</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>103</td>
  <td class=xl67 style='border-left:none'>Model Livestock Institute &amp;
  Veterinary Hospital</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>217</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>104</td>
  <td class=xl67 style='border-left:none'>Nasco Agro Products</td>
  <td class=xl67 style='border-left:none'>Bangladesh</td>
  <td class=xl73 style='border-left:none'>4</td>
  <td class=xl73 style='border-left:none'>4</td>
  <td class=xl75 style='border-left:none'>242,243,244,245</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>105</td>
  <td class=xl65 style='border-top:none;border-left:none'>Novatech Bangladesh
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>262,263</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>106</td>
  <td class=xl65 style='border-top:none;border-left:none'>Orion Pharma Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>220,221</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>107</td>
  <td class=xl65 style='border-top:none;border-left:none'>Panacia Agro Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>295</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>108</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Powertech
  Trading International</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>260, 261</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>109</td>
  <td class=xl65 style='border-top:none;border-left:none'>Pradhikar</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>216</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>110</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Radiance
  Animal Health</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>279</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>111</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Remedy
  Agrovet Ltd</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>293</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>112</td>
  <td class=xl65 style='border-top:none;border-left:none'>Safe Bio Products Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>277,278</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>113</td>
  <td class=xl65 style='border-top:none;border-left:none'>SMG Animal Health Co.
  Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>206,207</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>114</td>
  <td class=xl65 style='border-top:none;border-left:none'>Speed Care
  Distribution Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>188</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>115</td>
  <td class=xl65 style='border-top:none;border-left:none'>Sysnova Information
  System Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>219</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>116</td>
  <td class=xl65 style='border-top:none;border-left:none'>Uni - President
  (Vietnam)</td>
  <td class=xl65 style='border-top:none;border-left:none'>Vietnam</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>208,209</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>117</td>
  <td class=xl65 style='border-top:none;border-left:none'>Uttara Foods &amp;
  Feeds (Bangladesh) Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>India</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>287</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>118</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Victam
  International B.V.</td>
  <td class=xl68 width=78 style='border-top:none;border-left:none;width:59pt'>Netherland</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl72 width=150 style='border-top:none;border-left:none;width:113pt'>296</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>119</td>
  <td class=xl65 style='border-top:none;border-left:none'>Vital BD Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>184</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>120</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Wenger
  Manufacturing Inc.</td>
  <td class=xl65 style='border-top:none;border-left:none'>USA</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>297</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>121</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Xinxiang
  Hexie Animal Pharmaceuticals Company Ltd</td>
  <td class=xl65 style='border-top:none;border-left:none'>China</td>
  <td class=xl70 style='border-top:none;border-left:none'>2</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>280, 281</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>122</td>
  <td class=xl65 style='border-top:none;border-left:none'>Zaker Dairy Farm</td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>1</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>185</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl65 style='height:19.5pt;border-top:none'>123</td>
  <td class=xl68 width=329 style='border-top:none;border-left:none;width:247pt'>Zhejiang
  Esigma Biotechnology Co Ltd<span style='mso-spacerun:yes'> </span></td>
  <td class=xl65 style='border-top:none;border-left:none'>Bangladesh</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl70 style='border-top:none;border-left:none'>4</td>
  <td class=xl71 style='border-top:none;border-left:none'>224,225,226,227</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=28 style='width:21pt'></td>
  <td width=329 style='width:247pt'></td>
  <td width=78 style='width:59pt'></td>
  <td width=57 style='width:43pt'></td>
  <td width=60 style='width:45pt'></td>
  <td width=150 style='width:113pt'></td>
 </tr>
 <![endif]>
 
</table>
</div>
	
	
	</div>
  </div>




	
		
            </div>
        </div>
    </section>
    <!--End news-section Style-->

@stop

