<?php

///this is the database connection
include ('connections.php');

//this is for the header and body
include ("header.php");
?>

<div class="main-content" >
<div class="wrap-content container" id="container">

<!-- start: DYNAMIC TABLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<CENTER><h1 class="mainTitle">4P'S EDUCATION COMPLIANCE VERIFICATION SYSTEM</h1></CENTER>
</div>

</div>
</section>
<!-- end: PAGE TITLE -->

<!-- I will start my codes here for dashboard -->

<!-- start: FEATURED BOX LINKS -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-sm-4">
<div class="panel panel-white no-radius text-center">
<div class="panel-body">
<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
<h2 class="StepTitle">DSWD MANDATE</h2>
<p class="text-small">
The Department of Social Welfare and Development (DSWD) is mandated to provide assistance to LGUs, other Government Agencies, 
NGOs, POs, & other members of Civil Society in effectively implementing programs, projects & services that will enable all 
Filipinos to be free from hunger and poverty, have equal access to opportunities, enabled by a fair, just and peaceful society, 
as well as statutory & specialized programs which are directly lodged with the Department & not yet devolved to the LGUs.
</p>
<p class="links cl-effect-1">

</p>
</div>
</div>
</div>

<div class="col-sm-4">
<div class="panel panel-white no-radius text-center">
<div class="panel-body">
<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
<h2 class="StepTitle">DSWD VISION</h2>
<p class="text-small">
The Department of Social Welfare and Development envisions all Filipinos free from hunger and poverty,
have equal access to opportunities, enabled by a fair, just and peaceful society.
</p>
<p class="links cl-effect-1">
</p>
</div>
</div>
</div>

<div class="col-sm-4">
<div class="panel panel-white no-radius text-center">
<div class="panel-body">
<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
<h2 class="StepTitle">DSWD MISSION</h2>
<p class="text-small">
To lead in the formulation, implementation, and coordination of social welfare and development 
policies and programs for and with the poor, vulnerable and disadvantaged.
</p>
<p class="links cl-effect-1">

</p>
</div>
</div>
</div>
</div>
</div>
<!-- end: FEATURED BOX LINKS -->
<!-- start: TIMELINE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div id="timeline">
<div class="timeline">
<div class="spine"></div>
<div class="date_separator" id="november">
<span>THE DSWD 4P's</span>
</div>
<ul class="columns">
<li>
<div class="timeline_element partition-white">
<div class="timeline_date">
<div>
<div class="inline-block">

</div>

</div>
</div>
<div class="timeline_title">
<i class="fa fa-check fa-2x pull-left fa-border"></i>
<h4 class="light-text no-margin padding-5">PROMOTIVE PROGRAMS</h4>
</div>
<div class="timeline_content">
<B>Pantawid Pamilyang Pilipino Program 4P's</B> is an innovate social development approach that aims to break the inter-generational poverty
cycle by investing in human capital through the provision of cash assistance to extremely poor households for their health, nutrition and education,
particularly their children aged 0-18, provided that they comply with certain conditions that allow the family to meet important human development goals.
</div>
<div class="readmore">

</div>
</div>
</li>
<li>
<div class="timeline_element partition-white">
<div class="timeline_date">
<div>

</div>
</div>
<div class="timeline_title">
<i class="fa fa-check fa-2x pull-left fa-border"></i>
<h4 class="light-text no-margin padding-5">OBJECTIVES OF 4P's</h4>
</div>
<div class="timeline_content">
<div class="row">
<div class="col-md-9 col-xs-8">
*To build human capital; <br>
*Break the intergenerational cycle of poverty; and<br>
*To rebuild and strengthen the family bonds and values of its poor household-beneficiaries.
</div>
</div>
</div>

</div>
</li>
<li>
<div class="timeline_element partition-primary">
<div class="timeline_date">
<div>
<div class="inline-block">
<span class="day text-bold">DSWD</span>
</div>
<div class="inline-block">
<span class="block week-day text-extra-large">Core Values</span>
</div>
</div>
</div>
<div class="timeline_title">
<i class="fa fa-check-circle-o fa-2x pull-left fa-border"></i>
</div>
<div class="timeline_content">
<p>
Maagap at Mapagkalingang Serbisyo, Serbisyong Walang Puwang sa Katiwalian, Patas na Pagtrato sa Komunidad
</p>
</div>
<div class="readmore">
</div>
</div>
</li>
</ul>
</div>
</div>
</div></div></div>
<!-- I will end my codes here for dashboard -->



</div>
</div>
</div>
</div>
</div>
</div>
<!-- end: DYNAMIC TABLE -->


<?php
include ("footer.php");
?>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/DataTables/jquery.dataTables.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start:  JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/table-data.js"></script>
<script>
jQuery(document).ready(function() {
Main.init();
TableData.init();
});
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end:  JAVASCRIPTS -->
</body>
</html>
