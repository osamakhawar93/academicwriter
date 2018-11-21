<?php 
$level = $orders->academic_level;
$service = $orders->document_type;
$deadline = $orders->date;

//dd($deadline);
$pages = $orders->no_words['0'];
$price = $orders->price;
$orginal_price = $orders->orginal_price;
?>

@include('frontend.layouts.header')
@if(Session::has('user_id') && Session::get('user') == 'user')
@include('frontend.layouts.usernavbar')
@else
@include('frontend.layouts.navbar')
@endif

<style>
    .nav-pills>li>a {
    border-radius: 4px;
    background-color: #cccc;
    color: #2d2929;
}
.col-sm-offset-2 {
    margin-left: 19.666667%;
}
</style>
<main class="content-row">
    <div class="page-title-wrapp">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h3 class="page-title-01">Edit Order</h3>
						</div>
					</div>
<!--					<div class="row">
						<div class="col-lg-12">
							<ul class="breadcrumbs">
								<li class="active">
									<a href="index.php">Home</a>
								</li>
								<li>Order Now</li>
							</ul>
						</div>
					</div>-->
				</div>
			</div>
    <div class="page-title-wrapp">
        <!--   Big container   -->
        <div class="container">
            <!--<img id="steps" src="{{asset('/')}}/img/firststep.png" style="width: 20%;margin: 0px auto 20px;display: block;"/>-->

            <div class="row">
                <div class="col-sm-12 col-md-offset-1">
                <div class="col-sm-8">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            <form action="{{url('/updateorderform')}}" method="post" enctype="multipart/form-data">
                                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    {{ csrf_field() }}
                                    <input type="hidden" name="order_id"  value="{{$orders->order_id}}">
                                    <input type="hidden" name="price" id="pprice" value="{{$price}}">
                                    <input type="hidden" name="orginal_price" id="oprice" value="{{$orginal_price*2}}">
                                <div class="wizard-header">
                                    <h3 class="wizard-title col-md-offset-2">
                                        Follow the steps to place order.
                                    </h3>
                                </div>
                                <div class="col-sm-12 wizard-navigation">
                                    <ul>
                                        <li><a href="#about" data-toggle="tab" >1.About</a></li>
                                        <li><a href="#account" data-toggle="tab" >2.Detail</a></li>
                                        <li><a href="#address" data-toggle="tab">3.Payment</a></li>
                                    </ul>
                                </div>
                                    
                                <div class="tab-content">
                                    <div class="tab-pane" id="about">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 33px">
                                                <div class="col-sm-12 reply-form__box-01 name">
                                            <div class="col-sm-3"><label> Name <span class="red_star">*</span></label></div>
                                            
                                            <input class="col-sm-8 reply-form__name" type="text" name="name" id="name" value="{{$orders->name}}" aria-required="true" aria-invalid="false" placeholder="Name *">
                                                    
                                            </div>
                                            <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-3"><label> Email <span class="red_star">*</span></label></div>
                                                    <input class="col-sm-8 reply-form__email" type="email" name="email" id="email" value="{{$orders->email}}" aria-required="true" aria-invalid="false" placeholder="Email *">
                                                    
                                            </div>
                                            <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-3"><label> Phone<span class="red_star">*</span></label></div>
                                                    <input class="col-sm-8 reply-form__email" type="text" name="phone" id="phone" value="{{$orders->phone}}" aria-required="true" aria-invalid="false" placeholder="Phone *">
                                                    
                                            </div>
                                            <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-3"><label> Document Type <span class="red_star">*</span></label></div>
                                                <select name="work_type" id="work_type"   class="col-sm-8 reply-form__email required valid">
                                                    <option value="">What can we do for you?</option>
                                                    <option value="Essay" <?php if($service == 'Essay'){echo 'selected';} ?>>Essay</option>
                                                    <option value="Research Paper" <?php if($service == 'Research Paper'){echo 'selected';} ?>>Research Paper</option>
                                                    <option value="Thesis" <?php if($service == 'Thesis'){echo 'selected';} ?>>Thesis</option>
                                                    <option value="Term Paper" <?php if($service == 'Term Paper'){echo 'selected';} ?>>Term Paper</option>
                                                    <option value="Dissertation" <?php if($service == 'Dissertation'){echo 'selected';} ?>>Dissertation</option>
                                                    <option value="Assignment" <?php if($service == 'Assignment'){echo 'selected';} ?>>Assignment </option>
                                                    <option value="Book Reports" <?php if($service == 'Book Reports'){echo 'selected';} ?>>Book Reports </option>
                                                    <option value="Book Reviews" <?php if($service == 'Book Reviews'){echo 'selected';} ?>>Book Reviews </option>
                                                    <option value="Case Study" <?php if($service == 'Case Study'){echo 'selected';} ?>>Case Study </option>
                                                    <option value="College Paper" <?php if($service == 'College Paper'){echo 'selected';} ?>>College Paper </option>
                                                    <option value="Coursework" <?php if($service == 'Coursework'){echo 'selected';} ?>>Coursework </option>
                                                    <option value="eBooks" <?php if($service == 'eBooks'){echo 'selected';} ?>>eBooks </option>
                                                    <option value="Homework" <?php if($service == 'Homework'){echo 'selected';} ?>>Homework </option>
                                                    <option value="Lab Report" <?php if($service == 'Lab Report'){echo 'selected';} ?>>Lab Report </option>
                                                    <option value="Movie Review" <?php if($service == 'Movie Review'){echo 'selected';} ?>>Movie Review </option>
                                                    <option value="News Release" <?php if($service == 'News Release'){echo 'selected';} ?>>News Release </option>
                                                    <option value="Research Proposal" <?php if($service == 'Research proposal'){echo 'selected';} ?>>Research proposal </option>
                                                    <option value="School Paper" <?php if($service == 'School Paper'){echo 'selected';} ?>>School Paper </option>
                                                    <option value="Speech" <?php if($service == 'Speech'){echo 'selected';} ?>>Speech </option>
                                                    <option value="Admission Essay" <?php if($service == 'Admission Essay'){echo 'selected';} ?>>Admission Essay</option>
                                                    <option value="Annotated Bibliography" <?php if($service == 'Annotated Bibliography'){echo 'selected';} ?>>Annotated Bibliography</option>
                                                    <option value="Application Letter" <?php if($service == 'Application Letter'){echo 'selected';} ?>>Application Letter</option>
                                                    <option value="Argumentative Essay" <?php if($service == 'Argumentative Essay'){echo 'selected';} ?>>Argumentative Essay</option>
                                                    <option value="Biography" <?php if($service == 'Biography'){echo 'selected';} ?>>Biography</option>
                                                    <option value="Business Plan" <?php if($service == 'Business Plan'){echo 'selected';} ?>>Business Plan</option>
                                                    <option value="Cover Letter" <?php if($service == 'Cover Letter'){echo 'selected';} ?>>Cover Letter</option>
                                                    <option value="Creative Writing" <?php if($service == 'Creative Writing'){echo 'selected';} ?>>Creative Writing</option>
                                                    <option value="Critical Thinking" <?php if($service == 'Critical Thinking'){echo 'selected';} ?>>Critical Thinking</option>
                                                    <option value="Literature Review" <?php if($service == 'Literature Review'){echo 'selected';} ?>>Literature Review</option>
                                                    <option value="Personal Statement" <?php if($service == 'Personal Statement'){echo 'selected';} ?>>Personal Statement</option>
                                                    <option value="Report" <?php if($service == 'Report'){echo 'selected';} ?>>Report</option>
                                                    <option value="Scholarship Essay" <?php if($service == 'Scholarship Essay'){echo 'selected';} ?>>Scholarship Essay</option>
                                                    <option value="Thesis Proposal" <?php if($service == 'Thesis Proposal'){echo 'selected';} ?>>Thesis Proposal</option>
                                                    <option value="Powerpoint Presentation (with speaker notes)" <?php if($service == 'Powerpoint Presentation (with speaker notes)'){echo 'selected';} ?>>Powerpoint Presentation (with speaker notes)</option>
                                                    <option value="Powerpoint Presentation (without speaker notes)" <?php if($service == 'Powerpoint Presentation (without speaker notes)'){echo 'selected';} ?>>Powerpoint Presentation (without speaker notes)</option>

                                                    </select>
                                                
                                            </div>
                                            <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-3"><label> Academic level  <span class="red_star">*</span></label></div>
                                            <select name="level" id="level"  class="col-sm-8 reply-form__email required valid">
                                                <option value="">You study at?</option>
                                                          <option value="High School" <?php if($level == 'High School'){ echo 'selected';}?> >High School</option>
                                                          <option value="College Undergraduate" <?php if($level == 'College Undergraduate'){ echo 'selected';}?> >College-undergraduate</option>
                                                          <option value="Master" <?php if($level == 'Master'){ echo 'selected';}?>>Master</option>
                                                          <option value="Doctoral" <?php if($level == 'Doctoral'){ echo 'selected';}?>>Doctoral</option>

                                              </select>
                                            </div>
                
			    
                                            <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-3"><label> Number Of pages  <span class="red_star">*</span></label></div>
                                                            <select name="pages" id="pages"   class="col-sm-8 reply-form__email required">
                                                                                <option  value="">Select Pages Per Words</option>
                                                                                <option  value="01 Page ~ 300 Words" <?php if($pages == '1'){echo 'selected';} ?>>1 Page ~ 300 Words</option>
                                                                                <option  value="02 Pages ~ 600 Words" <?php if($pages == '2'){echo 'selected';} ?>>2 Pages ~ 600 Words</option>
                                                                                <option  value="03 Pages ~ 900 Words" <?php if($pages == '3'){echo 'selected';} ?>>3 Pages ~ 900 Words</option>
                                                                                <option  value="04 Pages ~ 1200 Words" <?php if($pages == '4'){echo 'selected';} ?>>4 Pages ~ 1200 Words</option>
                                                                                <option  value="05 Pages ~ 1500 Words" <?php if($pages == '5'){echo 'selected';} ?>>5 Pages ~ 1500 Words</option>
                                                                                <option  value="06 Pages ~ 1800 Words" <?php if($pages == '6'){echo 'selected';} ?>>6 Pages ~ 1800 Words</option>
                                                                                <option  value="07 Pages ~ 2100 Words" <?php if($pages == '7'){echo 'selected';} ?>>7 Pages ~ 2100 Words</option>
                                                                                <option  value="08 Pages ~ 2400 Words" <?php if($pages == '8'){echo 'selected';} ?>>8 Pages ~ 2400 Words</option>
                                                                                <option  value="09 Pages ~ 2700 Words" <?php if($pages == '9'){echo 'selected';} ?>>9 Pages ~ 2700 Words</option>
                                                                                <option  value="010 Pages ~ 3000 Words" <?php if($pages == '10'){echo 'selected';} ?>>10 Pages ~ 3000 Words</option>
                                                                                <option  value="011 Pages ~ 3300 Words" <?php if($pages == '11'){echo 'selected';} ?>>11 Pages ~ 3300 Words</option>
                                                                                <option  value="012 Pages ~ 3600 Words" <?php if($pages == '12'){echo 'selected';} ?>>12 Pages ~ 3600 Words</option>
                                                                                <option  value="013 Pages ~ 3900 Words" <?php if($pages == '13'){echo 'selected';} ?>>13 Pages ~ 3900 Words</option>
                                                                                <option  value="014 Pages ~ 4200 Words" <?php if($pages == '14'){echo 'selected';} ?>>14 Pages ~ 4200 Words</option>
                                                                                <option  value="015 Pages ~ 4500 Words" <?php if($pages == '15'){echo 'selected';} ?>>15 Pages ~ 4500 Words</option>
                                                                                <option  value="016 Pages ~ 4800 Words" <?php if($pages == '16'){echo 'selected';} ?>>16 Pages ~ 4800 Words</option>
                                                                                <option  value="017 Pages ~ 5100 Words" <?php if($pages == '17'){echo 'selected';} ?>>17 Pages ~ 5100 Words</option>
                                                                                <option  value="018 Pages ~ 5400 Words" <?php if($pages == '18'){echo 'selected';} ?>>18 Pages ~ 5400 Words</option>
                                                                                <option  value="019 Pages ~ 5700 Words" <?php if($pages == '19'){echo 'selected';} ?>>19 Pages ~ 5700 Words</option>
                                                                                <option  value="020 Pages ~ 6000 Words" <?php if($pages == '20'){echo 'selected';} ?>>20 Pages ~ 6000 Words</option>
                                                                                <option  value="021 Pages ~ 6300 Words" <?php if($pages == '21'){echo 'selected';} ?>>21 Pages ~ 6300 Words</option>
                                                                                <option  value="022 Pages ~ 6600 Words" <?php if($pages == '23'){echo 'selected';} ?>>22 Pages ~ 6600 Words</option>
                                                                                <option  value="023 Pages ~ 6900 Words" <?php if($pages == '22'){echo 'selected';} ?>>23 Pages ~ 6900 Words</option>
                                                                                <option  value="024 Pages ~ 7200 Words" <?php if($pages == '24'){echo 'selected';} ?>>24 Pages ~ 7200 Words</option>
                                                                                <option  value="025 Pages ~ 7500 Words" <?php if($pages == '25'){echo 'selected';} ?>>25 Pages ~ 7500 Words</option>
                                                                                <option  value="026 Pages ~ 7800 Words" <?php if($pages == '26'){echo 'selected';} ?>>26 Pages ~ 7800 Words</option>
                                                                                <option  value="027 Pages ~ 8100 Words" <?php if($pages == '27'){echo 'selected';} ?>>27 Pages ~ 8100 Words</option>
                                                                                <option  value="028 Pages ~ 5400 Words" <?php if($pages == '28'){echo 'selected';} ?>>28 Pages ~ 8400 Words</option>
                                                                                <option  value="029 Pages ~ 8700 Words" <?php if($pages == '29'){echo 'selected';} ?>>29 Pages ~ 8700 Words</option>
                                                                                <option  value="030 Pages ~ 9000 Words" <?php if($pages == '30'){echo 'selected';} ?>>30 Pages ~ 9000 Words</option>
                                                                                <option  value="031 Pages ~ 9300 Words" <?php if($pages == '31'){echo 'selected';} ?>>31 Pages ~ 9300 Words</option>
                                                                                <option  value="032 Pages ~ 9600 Words" <?php if($pages == '32'){echo 'selected';} ?>>32 Pages ~ 9600 Words</option>
                                                                                <option  value="033 Pages ~ 9900 Words" <?php if($pages == '33'){echo 'selected';} ?>>33 Pages ~ 9900 Words</option>
                                                                                <option  value="034 Pages ~ 10200 Words" <?php if($pages == '34'){echo 'selected';} ?>>34 Pages ~ 10200 Words</option>
                                                                                <option  value="035 Pages ~ 10500 Words" <?php if($pages == '35'){echo 'selected';} ?>>35 Pages ~ 10500 Words</option>
                                                                                <option  value="036 Pages ~ 10800 Words" <?php if($pages == '36'){echo 'selected';} ?>>36 Pages ~ 10800 Words</option>
                                                                                <option  value="037 Pages ~ 11100 Words" <?php if($pages == '37'){echo 'selected';} ?>>37 Pages ~ 11100 Words</option>
                                                                                <option  value="038 Pages ~ 11400 Words" <?php if($pages == '38'){echo 'selected';} ?>>38 Pages ~ 11400 Words</option>
                                                                                <option  value="039 Pages ~ 11700 Words" <?php if($pages == '39'){echo 'selected';} ?>>39 Pages ~ 11700 Words</option>
                                                                                <option  value="040 Pages ~ 12000 Words" <?php if($pages == '40'){echo 'selected';} ?>>40 Pages ~ 12000 Words</option>
                                                                                <option  value="041 Pages ~ 12300 Words" <?php if($pages == '41'){echo 'selected';} ?>>41 Pages ~ 12300 Words</option>
                                                                                <option  value="042 Pages ~ 12600 Words" <?php if($pages == '42'){echo 'selected';} ?>>42 Pages ~ 12600 Words</option>
                                                                                <option  value="043 Pages ~ 12900 Words" <?php if($pages == '43'){echo 'selected';} ?>>43 Pages ~ 12900 Words</option>
                                                                                <option  value="044 Pages ~ 13200 Words" <?php if($pages == '44'){echo 'selected';} ?>>44 Pages ~ 13200 Words</option>
                                                                                <option  value="045 Pages ~ 13500 Words" <?php if($pages == '45'){echo 'selected';} ?>>45 Pages ~ 13500 Words</option>
                                                                                <option  value="046 Pages ~ 13800 Words" <?php if($pages == '46'){echo 'selected';} ?>>46 Pages ~ 13800 Words</option>
                                                                                <option  value="047 Pages ~ 14100 Words" <?php if($pages == '47'){echo 'selected';} ?>>47 Pages ~ 14100 Words</option>
                                                                                <option  value="048 Pages ~ 14400 Words" <?php if($pages == '48'){echo 'selected';} ?>>48 Pages ~ 14400 Words</option>
                                                                                <option  value="049 Pages ~ 14700 Words" <?php if($pages == '49'){echo 'selected';} ?>>49 Pages ~ 14700 Words</option>
                                                                                <option  value="050 Pages ~ 15000 Words" <?php if($pages == '50'){echo 'selected';} ?>>50 Pages ~ 15000 Words</option>
                                                                                <option  value="051 Pages ~ 15300 Words" <?php if($pages == '51'){echo 'selected';} ?>>51 Pages ~ 15300 Words</option>
                                                                                <option  value="052 Pages ~ 15600 Words" <?php if($pages == '52'){echo 'selected';} ?>>52 Pages ~ 15600 Words</option>
                                                                                <option  value="053 Pages ~ 15900 Words" <?php if($pages == '53'){echo 'selected';} ?>>53 Pages ~ 15900 Words</option>
                                                                                <option  value="054 Pages ~ 16200 Words" <?php if($pages == '54'){echo 'selected';} ?>>54 Pages ~ 16200 Words</option>
                                                                                <option  value="055 Pages ~ 16500 Words" <?php if($pages == '55'){echo 'selected';} ?>>55 Pages ~ 16500 Words</option>
                                                                                <option  value="056 Pages ~ 16800 Words" <?php if($pages == '56'){echo 'selected';} ?>>56 Pages ~ 16800 Words</option>
                                                                                <option  value="057 Pages ~ 17100 Words" <?php if($pages == '57'){echo 'selected';} ?>>57 Pages ~ 17100 Words</option>
                                                                                <option  value="058 Pages ~ 17400 Words" <?php if($pages == '58'){echo 'selected';} ?>>58 Pages ~ 17400 Words</option>
                                                                                <option  value="059 Pages ~ 17700 Words" <?php if($pages == '59'){echo 'selected';} ?>>59 Pages ~ 17700 Words</option>
                                                                                <option  value="060 Pages ~ 18000 Words" <?php if($pages == '60'){echo 'selected';} ?>>60 Pages ~ 18000 Words</option>
                                                                                <option  value="061 Pages ~ 18300 Words" <?php if($pages == '61'){echo 'selected';} ?>>61 Pages ~ 18300 Words</option>
                                                                                <option  value="062 Pages ~ 18600 Words" <?php if($pages == '62'){echo 'selected';} ?>>62 Pages ~ 18600 Words</option>
                                                                                <option  value="063 Pages ~ 18900 Words" <?php if($pages == '63'){echo 'selected';} ?>>63 Pages ~ 18900 Words</option>
                                                                                <option  value="064 Pages ~ 19200 Words" <?php if($pages == '64'){echo 'selected';} ?>>64 Pages ~ 19200 Words</option>
                                                                                <option  value="065 Pages ~ 19500 Words" <?php if($pages == '65'){echo 'selected';} ?>>65 Pages ~ 19500 Words</option>
                                                                                <option  value="066 Pages ~ 19800 Words" <?php if($pages == '66'){echo 'selected';} ?>>66 Pages ~ 19800 Words</option>
                                                                                <option  value="067 Pages ~ 20100 Words" <?php if($pages == '67'){echo 'selected';} ?>>67 Pages ~ 20100 Words</option>
                                                                                <option  value="068 Pages ~ 20400 Words" <?php if($pages == '68'){echo 'selected';} ?>>68 Pages ~ 20400 Words</option>
                                                                                <option  value="069 Pages ~ 20700 Words" <?php if($pages == '69'){echo 'selected';} ?>>69 Pages ~ 20700 Words</option>
                                                                                <option  value="070 Pages ~ 21000 Words" <?php if($pages == '70'){echo 'selected';} ?>>70 Pages ~ 21000 Words</option>
                                                                                <option  value="071 Pages ~ 21300 Words" <?php if($pages == '71'){echo 'selected';} ?>>71 Pages ~ 21300 Words</option>
                                                                                <option  value="072 Pages ~ 21600 Words" <?php if($pages == '72'){echo 'selected';} ?>>72 Pages ~ 21600 Words</option>
                                                                                <option  value="073 Pages ~ 21900 Words" <?php if($pages == '73'){echo 'selected';} ?>>73 Pages ~ 21900 Words</option>
                                                                                <option  value="074 Pages ~ 22200 Words" <?php if($pages == '74'){echo 'selected';} ?>>74 Pages ~ 22200 Words</option>
                                                                                <option  value="075 Pages ~ 22500 Words" <?php if($pages == '75'){echo 'selected';} ?>>75 Pages ~ 22500 Words</option>
                                                                                <option  value="076 Pages ~ 22800 Words" <?php if($pages == '76'){echo 'selected';} ?>>76 Pages ~ 22800 Words</option>
                                                                                <option  value="077 Pages ~ 23100 Words" <?php if($pages == '77'){echo 'selected';} ?>>77 Pages ~ 23100 Words</option>
                                                                                <option  value="078 Pages ~ 23400 Words" <?php if($pages == '78'){echo 'selected';} ?>>78 Pages ~ 23400 Words</option>
                                                                                <option  value="079 Pages ~ 23700 Words" <?php if($pages == '79'){echo 'selected';} ?>>79 Pages ~ 23700 Words</option>
                                                                                <option  value="080 Pages ~ 24000 Words" <?php if($pages == '80'){echo 'selected';} ?>>80 Pages ~ 24000 Words</option>
                                                                                <option  value="081 Pages ~ 24300 Words" <?php if($pages == '81'){echo 'selected';} ?>>81 Pages ~ 24300 Words</option>
                                                                                <option  value="082 Pages ~ 24600 Words" <?php if($pages == '82'){echo 'selected';} ?>>82 Pages ~ 24600 Words</option>
                                                                                <option  value="083 Pages ~ 24900 Words" <?php if($pages == '83'){echo 'selected';} ?>>83 Pages ~ 24900 Words</option>
                                                                                <option  value="084 Pages ~ 25200 Words" <?php if($pages == '84'){echo 'selected';} ?>>84 Pages ~ 25200 Words</option>
                                                                                <option  value="085 Pages ~ 25500 Words" <?php if($pages == '85'){echo 'selected';} ?>>85 Pages ~ 25500 Words</option>
                                                                                <option  value="086 Pages ~ 25800 Words" <?php if($pages == '86'){echo 'selected';} ?>>86 Pages ~ 25800 Words</option>
                                                                                <option  value="087 Pages ~ 26100 Words" <?php if($pages == '87'){echo 'selected';} ?>>87 Pages ~ 26100 Words</option>
                                                                                <option  value="088 Pages ~ 26400 Words" <?php if($pages == '88'){echo 'selected';} ?> >88 Pages ~ 26400 Words</option>
                                                                                <option  value="089 Pages ~ 26700 Words" <?php if($pages == '89'){echo 'selected';} ?>>89 Pages ~ 26700 Words</option>
                                                                                <option  value="090 Pages ~ 2700 Words" <?php if($pages == '90'){echo 'selected';} ?>>90 Pages ~ 27000 Words</option>
                                                                                <option  value="091 Pages ~ 27300 Words" <?php if($pages == '91'){echo 'selected';} ?>>91 Pages ~ 27300 Words</option>
                                                                                <option  value="092 Pages ~ 27600 Words" <?php if($pages == '92'){echo 'selected';} ?>>92 Pages ~ 27600 Words</option>
                                                                                <option  value="093 Pages ~ 27900 Words" <?php if($pages == '93'){echo 'selected';} ?>>93 Pages ~ 27900 Words</option>
                                                                                <option  value="094 Pages ~ 28200 Words" <?php if($pages == '94'){echo 'selected';} ?>>94 Pages ~ 28200 Words</option>
                                                                                <option  value="095 Pages ~ 28500 Words" <?php if($pages == '95'){echo 'selected';} ?>>95 Pages ~ 28500 Words</option>
                                                                                <option  value="096 Pages ~ 28800 Words" <?php if($pages == '96'){echo 'selected';} ?>>96 Pages ~ 28800 Words</option>
                                                                                <option  value="097 Pages ~ 29100 Words" <?php if($pages == '97'){echo 'selected';} ?>>97 Pages ~ 29100 Words</option>
                                                                                <option  value="098 Pages ~ 29400 Words" <?php if($pages == '98'){echo 'selected';} ?>>98 Pages ~ 29400 Words</option>
                                                                                <option  value="099 Pages ~ 29700 Words" <?php if($pages == '99'){echo 'selected';} ?>>99 Pages ~ 29700 Words</option>
                                                                                <option  value="100 Pages ~ 30000 Words" <?php if($pages == '100'){echo 'selected';} ?>>100 Pages ~ 30000 Words</option>

                                                        </select>
                                                <div class="form-group mr-b-15" id="powerpoint_type_div" style="display:none;">
                                                <div class="col-md-4"><label></label></div>
                                                <div class="col-md-8">
                                                    <em>(1 page = 2 powerpoint slides)</em>
                                                </div>
                                               </div>
                                            </div>
                
                                            <div class="col-sm-12 reply-form__box-01 your-email" >
                                               <div class="col-sm-3" ><label> Select Deadline <span class="red_star">*</span></label></div>
                                               <div class="col-sm-4" style="margin-bottom: 12px;"><input style="border-radius: 25px;padding-left: 32px;" id="deadline" name="date" type="text"   class="reply-form__email  datepicker" /></div>      
                                                    <div class="col-sm-3">
                                                  
                                                            <select name="hours" id="hours"   class="reply-form__email time-icon required time-icon">
                                                                                <option  value="00:00">00:00</option>
                                                                                <option  value="01:00">01:00</option>
                                                                                <option  value="02:00">02:00</option>
                                                                                <option  value="03:00">03:00</option>
                                                                                <option  value="04:00">04:00</option>
                                                                                <option  value="05:00">05:00</option>
                                                                                <option  value="06:00">06:00</option>
                                                                                <option  value="07:00">07:00</option>
                                                                                <option  value="08:00">08:00</option>
                                                                                <option  value="09:00">09:00</option>
                                                                                <option  value="10:00">10:00</option>
                                                                                <option  value="11:00">11:00</option>
                                                                                <option  value="12:00">12:00</option>
                                                                                <option  value="13:00">13:00</option>
                                                                                <option  value="14:00">14:00</option>
                                                                                <option  value="15:00">15:00</option>
                                                                                <option  value="16:00">16:00</option>
                                                                                <option  value="17:00">17:00</option>
                                                                                <option  value="18:00">18:00</option>
                                                                                <option  value="19:00">19:00</option>
                                                                                <option  value="20:00">20:00</option>
                                                                                <option  value="21:00">21:00</option>
                                                                                <option  value="22:00">22:00</option>
                                                                                <option  value="23:00">23:00</option>

                                                                </select>
                                              </div>
                                            </div>
<!--                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="pricegrad" style="border-radius: 6px">
								<p style="padding: 10px 0px 0 20px; font-size: 20px;"><b>Your Price: $<span id="dprice" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></b></p>
								<div style="width:85%;">
									<p style="padding: 20px 0px 0px 22px; font-size: 20px;display:inline-block;">Was: $<span id="tprice" style="text-decoration: line-through; text-decoration-color: red;"><?php if($price == ''){echo '0.00';} else {echo $price*2;} ?></span></p>
									<p style="padding: 20px 0px 0px 25px; font-size: 20px;display:inline-block;">Now: $<span id="d2price" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></p>
								</div>
								<p style="padding: 0 20px 0 20px; font-size: 20px;"><b>You Save: $<span id="d3price" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></b></p>
								<p style="padding: 0 20px 25px 20px; font-size: 20px;">Offer Ends: <i class="fa fa-clock-o"></i> 7 Days</p>
							</div>
                                                    <div class="form-group mr-b-15">
                                                    <label class="col-sm-12 control-label mr-t-6" for="inputEmail3" id="deliveryDate" style="text-align:left;"></label>	  
                                                    </div>
                                                </div>-->
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="account">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 33px">
                                                <div class="col-sm-12 reply-form__box-01 name">
                                                    <div class="col-sm-3"><label> Assignment Title <span class="red_star">*</span></label></div>
                                            
                                                    <input class="col-sm-8 reply-form__name" type="text" name="title" id="title" value="{{$orders->title}}" aria-required="true" aria-invalid="false" placeholder="Type assignment title">
                                                    
                                                </div>
                                                <div class="col-sm-12 reply-form__box-01 your-email">
                                                    <div class="col-sm-3"><label> Subject  <span class="red_star">*</span></label></div>
                                                    <select name="subject" class="col-sm-8 reply-form__name required" id="subject">
                                                                <option value="">Select your course name</option>
                                                                <option value="Biology and Life Sciences" <?php if($orders->subject == 'Biology and Life Sciences'){ echo 'selected'; }?>>Biology and Life Sciences</option>
                                                                <option value="Business and Management" <?php if($orders->subject == 'Business and Management'){ echo 'selected'; }?>>Business and Management</option>
                                                                <option value="Chemistry" <?php if($orders->subject == 'Chemistry'){ echo 'selected'; }?>>Chemistry</option>
                                                                <option value="Culture" <?php if($orders->subject == 'Culture'){ echo 'selected'; }?>>Culture</option>
                                                                <option value="Economics" <?php if($orders->subject == 'Economics'){ echo 'selected'; }?>>Economics</option>
                                                                <option value="Education" <?php if($orders->subject == 'Education'){ echo 'selected'; }?>>Education</option>
                                                                <option value="English" <?php if($orders->subject == 'English'){ echo 'selected'; }?>>English</option>
                                                                <option value="Environmental Science" <?php if($orders->subject == 'Environmental Science'){ echo 'selected'; }?>>Environmental Science</option>
                                                                <option value="Finance, Accounting and Banking" <?php if($orders->subject == 'Geography'){ echo 'selected'; }?>>Finance, Accounting and Banking</option>
                                                                <option value="Geography" <?php if($orders->subject == ''){ echo 'selected'; }?>>Geography</option>
                                                                <option value="Project Management" <?php if($orders->subject == 'Project Management'){ echo 'selected'; }?>>Project Management</option>
                                                                <option value="Operational Plan" <?php if($orders->subject == 'Operational Plan'){ echo 'selected'; }?>>Operational Plan</option>
                                                                <option value="Critical review" <?php if($orders->subject == 'Critical review'){ echo 'selected'; }?>>Critical review</option>
                                                                <option value="Critical Appraisal" <?php if($orders->subject == 'Critical Appraisal'){ echo 'selected'; }?>>Critical Appraisal</option>
                                                                <option value="Capstone" <?php if($orders->subject == 'Capstone'){ echo 'selected'; }?>>Capstone</option>
                                                                <option value="Reflective Thinking" <?php if($orders->subject == 'Reflective Thinking'){ echo 'selected'; }?>>Reflective Thinking</option>
                                                                <option value="Healthcare and Nursing" <?php if($orders->subject == 'Healthcare and Nursing'){ echo 'selected'; }?>>Healthcare and Nursing</option>
                                                                <option value="History and Anthropology" <?php if($orders->citation == 'History and Anthropology'){ echo 'selected'; }?>>History and Anthropology</option>
                                                                <option value="HRM" <?php if($orders->subject == 'HRM'){ echo 'selected'; }?>>HRM</option>
                                                                <option value="International Relations" <?php if($orders->subject == 'International Relations'){ echo 'selected'; }?>>International Relations</option>
                                                                <option value="IT" <?php if($orders->subject == 'IT'){ echo 'selected'; }?>>IT</option>
                                                                <option value="Law and International Law" <?php if($orders->subject == 'Law and International Law'){ echo 'selected'; }?>>Law and International Law</option>
                                                                <option value="Linguistics" <?php if($orders->subject == 'Linguistics'){ echo 'selected'; }?>>Linguistics</option>
                                                                <option value="Literature" <?php if($orders->subject == 'Literature'){ echo 'selected'; }?>>Literature</option>
                                                                <option value="Marketing and PR" <?php if($orders->subject == 'Marketing and PR'){ echo 'selected'; }?>>Marketing and PR</option>
                                                                <option value="Maths" <?php if($orders->subject == 'Maths'){ echo 'selected'; }?>>Maths</option>
                                                                <option value="Philosophy" <?php if($orders->subject == 'Philosophy'){ echo 'selected'; }?>>Philosophy</option>
                                                                <option value="Physics" <?php if($orders->subject == 'Physics'){ echo 'selected'; }?>>Physics</option>
                                                                <option value="Political Science" <?php if($orders->subject == 'Political Science'){ echo 'selected'; }?>>Political Science</option>
                                                                <option value="Psychology" <?php if($orders->subject == 'Psychology'){ echo 'selected'; }?>>Psychology</option>
                                                                <option value="Sociology" <?php if($orders->subject == 'Sociology'){ echo 'selected'; }?>>Sociology</option>
                                                                <option value="Statistics" <?php if($orders->subject == 'Statistics'){ echo 'selected'; }?>>Statistics</option>
                                                                <option value="Other" <?php if($orders->subject == 'Other'){ echo 'selected'; }?>>Other</option>
                                                         </select>
                                                </div>
                                                <div class="col-sm-12 reply-form__box-01 your-email">
                                                    <div class="col-sm-3"><label> Citation Style  <span class="red_star">*</span></label></div>
                                                    <select name="citation" id="citation" class="col-sm-8 reply-form__name required" onchange="changeCitation();">
                                                            <option value="">Select a citation style</option>
                                                            <option value="AMA" <?php if($orders->citation == 'AMA'){ echo 'selected'; }?>>AMA</option>
                                                            <option value="APA" <?php if($orders->citation == 'APA'){ echo 'selected'; }?>>APA</option>
                                                            <option value="AMS" <?php if($orders->citation == 'AMS'){ echo 'selected'; }?>>AMS</option>
                                                            <option value="Chicago" <?php if($orders->citation == 'Chicago'){ echo 'selected'; }?>>Chicago</option>
                                                            <option value="MLA" <?php if($orders->citation == 'MLA'){ echo 'selected'; }?>>MLA</option>
                                                            <option value="Turbian" <?php if($orders->citation == 'Turbian'){ echo 'selected'; }?>>Turbian</option>
                                                            <option value="other" <?php if($orders->citation == 'other'){ echo 'selected'; }?>>Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 reply-form__box-01 name">
                                                    <div class="col-sm-3"><label> Number of sources <span class="red_star">*</span></label></div>
                                            
                                                    <input class="col-sm-8 reply-form__name" type="text" name="sources" value="{{$orders->sources}}" id="sources" aria-required="true" aria-invalid="false" placeholder="e.g 3 Sources (1 Literary, 2 Peer Reviewed Academic Sources)">
                                                    
                                                </div>
                                                <div class="col-sm-12 reply-form__box-01 name">
                                                    <div class="col-sm-3"><label> Description</label></div>
                                            
                                                    <textarea style="margin: 0px; height: 163px;" class="col-sm-8 reply-form__name" type="text" name="description" id="description"   placeholder="Describe your task in detail or attach original file with teacher's instructions.">{{$orders->description}}</textarea>
                                                   
                                                </div>
                                                <input name="doccount" value="{{count($document)}}" type="hidden" > 
                                                <div class="col-sm-12 reply-form__box-01 name">
                                                    <div class="col-sm-3"><label> Attachment <span class="red_star">*</span></label></div>
                                                    @if(count($document)>0)
                                                    <input  data-buttonText="Select a File" class="col-sm-8 reply-form__name fileUpload" type="file" name="reportss[]" id="file" multiple="true">
                                                    @else
                                                    <input  data-buttonText="Select a File" class="col-sm-8 reply-form__name fileUpload" type="file" name="reports[]" id="file" multiple="true" required>
                                                    @endif
                                                </div>
                                                <div class="col-sm-12 reply-form__box-01 name">
                                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Files</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>

                                                 <tbody>

                                                     @if(count($document)>0)
                                                     @foreach($document as $j=>$r) 
                                                <tr>
                                                    <td>{{$j+1}}</td>
                                                    <td><a href="{{url('/')}}/user_portal/document/download/{{$r->attachment}}"><span class="glyphicon glyphicon-download-alt"></span>{{$r->orginal_name}} </a>
                                                                                   </td>
                                                    <td><a  href="{{url('/')}}/user_portal/document/delete/{{$r->attachment_id}}/{{$r->order_id}}" class="btn btn-danger"><i class="icon-download-alt"> </i> Delete </a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                 </tbody>
                                            </table>
                                                </div>
                                                
                                                
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="address">
                                        <div class="row">
                                            
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-sm-11 wizard-footer">
                                    <div class="pull-right" id="appendbtn">
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' style="width: 120px;"/>
                                        @if(Session::has('user_id'))
                                        <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Save and pay latere'/>
                                        @else
                                        <a id="ordersubmit" class='btn btn-finish btn-fill btn-success btn-wd'  name='finish' value='Save and pay latere'/>Save and pay latere</a>
                                        @endif
                                    </div>
                                        
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' style="width: 120px;"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                    <div class="clearfix"></div>
                    
                    
                </div>
                
                    <div class="col-md-4" style="margin-top: 6%; border-radius: 6px">
                    <div class="col-md-12 pricegrad" style="margin-top: 10%; border-radius: 6px">
    
  
     
                        <div id="rightPanelPrice" class="pricegrad" style="border-radius: 6px">  
                            <div id="price-box-2">
                                <div class="price-box-inner">
                                    <div class="pricegrad" style="border-radius: 6px">
								<p style="padding: 10px 0px 0 20px; font-size: 20px;"><b>Your Price: $<span id="dprice" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></b></p>
								<div style="width:85%;">
									<p style="padding: 20px 0px 0px 22px; font-size: 20px;display:inline-block;">Was: $<span id="tprice" style="text-decoration: line-through; text-decoration-color: red;"><?php if($price == ''){echo '0.00';} else {echo $price*2;} ?></span></p>
									<p style="padding: 20px 0px 0px 25px; font-size: 20px;display:inline-block;">Now: $<span id="d2price" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></p>
								</div>
								<p style="padding: 0 20px 0 20px; font-size: 20px;"><b>You Save: $<span id="d3price" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></b></p>
								<p style="padding: 0 20px 25px 20px; font-size: 20px;">Offer Ends: <i class="fa fa-clock-o"></i> 7 Days</p>
							
                                    </div>
                                        <div id="payableMessage" style="padding-left:0px;"></div>
                                </div>
                            </div>
                            <div class="check-btn" style="padding-left: 55px;">
                                <input type="button" onclick="isOrderFormValid();" class="btn btn-primary" value="REVIEW &amp; CHECKOUT">
                            </div>
                            <div class="policy-text" style="margin-left:20px">
                            <p>I agree with policies and terms and conditions by clicking button above</p>
                                      <!--<a class="order-save-text"  style="cursor:pointer; padding: 53px">Save and pay later</a>-->
                                    </div>
                          <div class="payment-section">
                              <h3 style="padding: 10px 0px 10px 51px;">Payment Option</h3>
                              <a href="" style="padding: 30px"><img src="{{url('/')}}/img/payment-option.png" alt="" title=""></a>
                           </div>
                         </div>
                      
                    </div>
                        <div class="form-group mr-b-15">
                                                    <label class="col-sm-12 control-label mr-t-6" for="inputEmail3" id="deliveryDate" style="text-align:left;"></label>	  
                                                    </div>
                    </div>
                    
                </div>
                <div class="clearfix"></div>
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->
</main>
<div class="clearfix"></div>
<hr>
<div id="myModal" class="modal fade" role="dialog" style="display:none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width:100%;">
        <div class="modal-header" style="background-color:#337ab7; color: white; border-radius: 6px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
        <div class="modal-body" id="myModalbody">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defualt" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="myModal2" class="modal fade" role="dialog" style="display:none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width:100%;">
        <div class="modal-header" style="background-color:#337ab7; color: white; border-radius: 6px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login Here</h4>
      </div>
        <div class="modal-body" style="margin-bottom: 28px;">
          <p class="myModal2"></p>
          <form method="post" action="#" >
                {{ csrf_field() }}
                <span style="height: 44px; margin-bottom: 5px; border-color: red; display: none" class="form-control error" id="errorm"></span>
                <input style="height: 44px;" class="form-control" id="emaillogin" type="email" name="email" placeholder="Email" required="">
                <input style="margin-top: 8px" class="form-control" id="passwordlogin" type="password" name="password" placeholder="Password" required="">
                <input style="padding: 5px 20px 5px 20px;" type="submit" id="loginform" name="login" class="login loginmodal-submit pull-right" value="Login">
          </form>
      </div>
        <div class="modal-footer" style="margin-top: 4px">
            <a href="#" id='btnreg' class="pull-left"> Register Here</a>. 
      </div>
    </div>
  </div>
</div>
    <div id="myModalreg"  class="modal fade" role="dialog" style="padding:0px; display:none">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="width:100%;">
        <div class="modal-header" style="background-color:#337ab7; color: white; border-radius: 6px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register Here</h4>
      </div>
        <div class="modal-body" style="margin-bottom: 28px;">
          <p class="myModal2"></p>
          <form class="register" method="post" action="#">
                {{ csrf_field() }}
                <div style="margin-top: 8px; border-color: red; display:none" class="form-control" type="text" id="regerrormsg"></div>
                <input style="margin-top: 8px" class="form-control" type="text" name="name" id="namereg" placeholder="Username">
                <input style="margin-top: 8px; height: 35px"  class="form-control" type="email" name="email" id="emailreg" placeholder="Email">
                <input style="margin-top: 8px" class="form-control" type="text" name="phone" placeholder="Phone" id="phonereg">
                <input style="margin-top: 8px; height: 35px" class="form-control" type="password" name="password" id="passwordreg" placeholder="Password">
                <input style="margin-top: 8px; height: 35px" class="form-control" type="password" name="cpass" id="cpasswordreg" placeholder="Confirm Password">
                <div style="margin-top: 8px; border-color: red; display:none" class="form-control" type="text" id="cperrormsg"></div>
                <input  type="checkbox" name="checkbox" id="acceptregpolicy" value="I have read the Privacy Policy and agree to the terms and conditions"><span>I have read the Privacy Policy and agree to the terms and conditions</span>
                <div style="margin-top: 8px; border-color: red; display:none" class="form-control" type="text" id="acceptregpolicymsg"></div>

                <input style="float:right; margin-top:27px" type="submit" name="submit" id="registerform" class="btn btn-primary" value="Submit">
          </form>
      </div>
        <div class="modal-footer" style="margin-top: 4px">
            <a href="#" id='btnlogin'  class="pull-left"> Login Here</a>. 
      </div>
    </div>

  </div>
</div>
@include('frontend.layouts.footer')
    
    
<script src="{{asset('/')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}/js/jquery.bootstrap.js" type="text/javascript"></script>
<script  src="{{asset('/')}}/js/jquery.maskedinput.min.js"></script>
<script>
 
	jQuery(function($){
	   $("#phone").mask("+99-9999999999");
	});
        jQuery(function($){
	   $("#phonereg").mask("+99-9999999999");
	});
</script>
<link type="text/css" href="{{asset('/')}}/js/jquery.simple-dtpicker.css" rel="stylesheet" />
<script type="text/javascript" src="{{asset('/')}}/js/jquery.simple-dtpicker.js"></script>
    
<!--  Plugin for the Wizard -->
<script src="{{asset('/')}}/js/material-bootstrap-wizard.js"></script>
    
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('/')}}/js/jquery.validate.min.js">

</script>

<script>
     function changeWorkType(){
         
	var type = $('#work_type').val();
	//alert('1');
	if(type=='other'){
		$('#other_work_type_div').slideDown();
	}else{
		$('#other_work_type_div').slideUp();	
	}
	
	if(type=='Powerpoint Presentation (with speaker notes)' || type=='Powerpoint Presentation (without speaker notes)'){	
		$('#powerpoint_type_div').slideDown();
	}else{
		$('#powerpoint_type_div').slideUp();	
	}

}

    function changeSubjectType(){
	
	var type = $('#subject').val();
	if(type=='Other'){
		$('#other_subject_div').slideDown();
	}else{
		$('#other_subject_div').slideUp();	
	}

}

function changeCitation(){

	var type = $('#citation').val();
	
	if(type=='other'){
		$('#other_citation_div').slideDown();
	}else{
		$('#other_citation_div').slideUp();
	}

}

$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $("#loginform").click(function(e){

        e.preventDefault();



        var email = $("#emaillogin").val();

        var password = $("#passwordlogin").val();

        var url = '{{url("/authentication")}}';


        $.ajax({

           type:'POST',

           url:url,

           data:{password:password, email:email},

           success:function(data){

              //alert(data.error);
              if(data.success == true){
                  $('#myModal2').modal('hide');
                  $('#myModal').modal('show');
                  $('#myModalbody').text('You have been login successfully.Now you can place your order.');
                  $('#ordersubmit').css('display','none');
                  $('#appendbtn').html("<input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' style='margin-right: 28px; width: 120px;'/>");
                }else{
                    
                    $('#errorm').html(data.error);
                    $('#errorm').fadeIn().delay(3000).fadeOut();
                }
           }

        });



	});
        
    $("#registerform").click(function(e){

        e.preventDefault();
        var email = $("#emailreg").val();
        var password = $("#passwordreg").val();
        var cpassword = $("#cpasswordreg").val();
        var name = $("#namereg").val();
        var phone = $("#phonereg").val();
        var url = '{{url("/registration")}}';
        //alert(phone);
       
        if(email == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
           // $('#emailreg').css('border-color','red');
                $('#emailreg').css('border-color','red');
        }
        if(password == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#passwordreg').css('border-color','red');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
        }
        if(cpassword == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#cpasswordreg').css('border-color','red');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
        }
        if(name == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#namereg').css('border-color','red');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
        }
        if(phone == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#phonereg').css('border-color','red');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
        }
        if(password != cpassword){
            $('#cperrormsg').html('');
            $('#cperrormsg').html('Password and Confirm Password does not matched.*');
            $('#passwordreg').css('border-color','red'); 
            $('#cpasswordreg').css('border-color','red'); 
            $('#cperrormsg').fadeIn().delay(3000).fadeOut();
        }
        if($('#acceptregpolicy').is(":checked") == false){
            $('#acceptregpolicymsg').html('');
            $('#acceptregpolicymsg').html('Please accept the registartion policy.*');
            $('#acceptregpolicy').css('border-color','red');
            $('#acceptregpolicymsg').fadeIn().delay(3000).fadeOut();
        }
        if(email != "" && password != "" && name != "" && phone != "" && password == cpassword && $('#acceptregpolicy').is(":checked") == true){
            
        $.ajax({
           type:'POST',
           url:url,
           data:{name:name,phone:phone,password:password, email:email},
           success:function(data){

              //alert(data.error);
              if(data.success == true){
                  
                  $('#myModalreg').modal('hide');
                  $('#myModal2').modal('show');
                  $('.myModal2').text(data.message);
                }else{
                    
                    $('#regerrormsg').html('');
                    $('#regerrormsg').html(data.error);
                    $('#regerrormsg').fadeIn().delay(3000).fadeOut();
                }
           }

        });
        }


	});    
$(document).ready(function(){
  
    $('#emailreg').on('keypress',function(){$(this).css('border-color','green');});
    $('#passwordreg').on('keypress',function(){$(this).css('border-color','green');});
    $('#cpasswordreg').on('keypress',function(){$(this).css('border-color','green');});
    $('#namereg').on('keypress',function(){$(this).css('border-color','green');});
    $('#phonereg').on('keypress',function(){$(this).css('border-color','green');});
//    if('{{$price}}' != ''){
//        
//        document.getElementById("tprice").innerHTML = '{{$orginal_price}}';
//        document.getElementById("dprice").innerHTML = '{{$price}}';
//        document.getElementById("d2price").innerHTML = '{{$price}}';
//        document.getElementById("d3price").innerHTML = '{{$price}}';
//        document.getElementById("pprice").value = '{{$price}}';
//   }
			$('#deadline,#pages,#level').on('change', function() {	
                                var date = $('#deadline').datepicker('getDate');
                                var today = new Date();
                                var dayDiff = Math.ceil((date - today) / (1000 * 60 * 60 * 24));
                                
                               // alert(dayDiff);
				var dl = dayDiff;
				var level = $('#level').val();
				var str = $('#pages').val();
				var pages = str.substring(0,3);
                               // alert(level);
				if(dl >= '8'){
					if(level == 'High School'){var price = '15';}
					if(level == 'College Undergraduate'){var price = '18';}
					if(level == 'Master'){var price = '20.50';}
					if(level == 'Doctoral'){var price = '30';}
					}
				//7days
				if(dl == '7'){
					if(level == 'High School'){var price = '15';}
					if(level == 'College Undergraduate'){var price = '18.25';}
					if(level == 'Master'){var price = '21';}
					if(level == 'Doctoral'){var price = '32';}
					}
                                        //6 days
                                if(dl == '6'){
					if(level == 'High School'){var price = '15';}
					if(level == 'College Undergraduate'){var price = '18.25';}
					if(level == 'Master'){var price = '21';}
					if(level == 'Doctoral'){var price = '32';}
					} 
                                        //5 days
                                if(dl == '5'){
					if(level == 'High School'){var price = '15.50';}
					if(level == 'College Undergraduate'){var price = '18.50';}
					if(level == 'Master'){var price = '21.50';}
					if(level == 'Doctoral'){var price = '33';}
					}      
                                        //4 days
                                if(dl == '4'){
					if(level == 'High School'){var price = '15.50';}
					if(level == 'College Undergraduate'){var price = '18.50';}
					if(level == 'Master'){var price = '21.50';}
					if(level == 'Doctoral'){var price = '33';}
					} 
                                        //3days
				if(dl == '3'){
					if(level == 'High School'){var price = '16.50';}
					if(level == 'College Undergraduate'){var price = '19';}
					if(level == 'Master'){var price = '22.75';}
					if(level == 'Doctoral'){var price = '34';}
					}
                                        //2 days
				if(dl == '2'){
					if(level == 'High School'){var price = '18.75';}
					if(level == 'College Undergraduate'){var price = '19.50';}
					if(level == 'Master'){var price = '22.75';}
					if(level == 'Doctoral'){var price = '35';}
					}
                                        //24 hours
				if(dl == '1'){
					if(level == 'High School'){var price = '20.25';}
					if(level == 'College Undergraduate'){var price = '21.50';}
					if(level == 'Master'){var price = '25.25';}
					if(level == 'Doctoral'){var price = '50';}
					}
                                        //12 hours
				if(dl <= '0'){
                                   // alert(0);
					if(level == 'High School'){var price = '21.25';}
					if(level == 'College Undergraduate'){var price = '22.50';}
					if(level == 'Master'){var price = '27.25';}
					if(level == 'Doctoral'){var price = '75';}
					}
                                        
				var dtotal = price * pages;
				var ttotal = dtotal * 2;
				document.getElementById("tprice").innerHTML = ttotal;
				document.getElementById("dprice").innerHTML = dtotal;
				document.getElementById("oprice").value = dtotal;
				document.getElementById("d2price").innerHTML = dtotal;
				document.getElementById("d3price").innerHTML = dtotal;
				document.getElementById("pprice").value = dtotal;
                                if(dl > '-1' && dl > 0){
				document.getElementById("deliveryDate").innerHTML = "" ;
				document.getElementById("deliveryDate").innerHTML = "Your order will be placed within " + dl + " days" ;
                            }else {
                                
                            }
			});
                        });
	</script>
<script type="text/javascript">
$(document).ready(function(){
   
//$('#myModalreg').modal('show');
$('#deadline').datepicker({
    onSelect: function() {
        var date = $(this).datepicker('getDate');
        var today = new Date();
        var dayDiff = Math.ceil((today - date) / (1000 * 60 * 60 * 24));
        
    },
    minDate: new Date(),
    dateFormate: 'yyyy/mm/dd'
});
var someDate = new Date();
var date = '{{$deadline}}';
//someDate.setDate(someDate.getDate()+date);
//var month = someDate.getMonth() + 1; //Add 1 because January is set to 0 and Dec is 11
//var day = someDate.getDate();
//var year = someDate.getFullYear();
//var now = month + "/" + day + "/" + year;
//alert('{{$service}}');
//$('#deadline').val(now);
$('#deadline').val(date);

//alert(now);
$('#btnreg').on('click',function(){
    $('#myModal2').modal('hide');
    $('#myModalreg').modal('show');
    //$('.myModal2').text('Sorry!You have to login to place order');
});
$('#ordersubmit').on('click',function(){
    $('#myModal2').modal('show');
    $('.myModal2').text('Sorry!You have to login to place order');
});
if('{{Session::has("success")}}'){
    $('#myModal').modal('show');
    $('#myModalbody').text('{{Session::get("success")}}');
}
});
</script> 