<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<!-- DATE PICKERS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/month-picker/css/responsive-month-range-picker.css">

<body>
<?php $this->load->view('include/header_users'); ?>
<?php $this->load->view('include/sidebar_users'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10"> 
		
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
					<div id="container" style="height: 350px; "></div>
					<br>
				</div>	
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
					<div id="container_testing" style="height: 350px; "></div>
					<br>
				</div>	
			</div>
		</div>


		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
 					<table class="table table-hover table-bordered text-center">
 						<thead class="thead-light">
 							<tr>
 								<th scope="col"></th>
 								<th scope="col">Juni (20)</th>
 								<th scope="col">Juli (20)</th>
 								<th scope="col">Agustus (5)</th>
 								<th scope="col">September (0)</th> 
 							</tr>
 						</thead>
 						<tbody id="tbody_actual">
 							<tr>
 								<th scope="col">Order</th>
 								<td>4091</td>
 								<td>4133</td>
 								<td>893</td>
 								<td></td>
 							</tr>
 							<tr>
 								<th scope="col">Kap Prod</th>
 								<td>5301</td>
 								<td>5083</td>
 								<td>493</td>
 								<td></td>
 							</tr>
 							<tr>
 								<th scope="col">Bal</th>
 								<td>401</td>
 								<td>583</td>
 								<td>93</td>
 								<td></td>
 							</tr>
 							<tr>
 								<th scope="col">% Load</th>
 								<td>82%</td>
 								<td>80%</td>
 								<td>13%</td>
 								<td></td>
 							</tr>
 							<tr>
 								<th scope="col">OT (hour)</th>
 								<td>0</td>
 								<td>0</td>
 								<td>0</td>
 								<td></td>
 							</tr>
 							<tr>
 								<th scope="col">DL Need</th>
 								<td>53</td>
 								<td>53</td>
 								<td>0</td>
 								<td></td>
 							</tr>
 							<tr>
 								<th scope="col">Direct Eff</th>
 								<td>120%</td>
 								<td>110%</td>
 								<td>120%</td>
 								<td></td>
 							</tr>
 						</tbody>
 					</table> 
					<br>
				</div>	
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
 					<table class="table table-hover table-bordered text-center">
 						<thead class="thead-light">
 							<tr>
 								<th scope="col"></th>
 								<th scope="col">Juni (20)</th>
 								<th scope="col">Juli (20)</th>
 								<th scope="col">Agustus (5)</th>
 								<th scope="col">September (0)</th> 
 							</tr>
 						</thead>
 						<tbody id="tbody_testing">
 							<tr>
 								<th scope="row">Order</th>
 								<td class="inner">4091</td>
 								<td class="inner">4133</td>
 								<td class="inner">893</td>
 								<td class="inner"></td>
 							</tr>
 							<tr>
 								<th scope="col">Kap Prod</th>
 								<td class="inner">5301</td>
 								<td class="inner">5083</td>
 								<td class="inner">493</td>
 								<td class="inner"></td>
 							</tr>
 							<tr>
 								<th scope="col">Bal</th>
 								<td class="inner">401</td>
 								<td class="inner">583</td>
 								<td class="inner">93</td>
 								<td class="inner"></td>
 							</tr>
 							<tr>
 								<th scope="col">% Load</th>
 								<td class="inner">82%</td>
 								<td class="inner">80%</td>
 								<td class="inner">13%</td>
 								<td class="inner"></td>
 							</tr>
 							<tr>
 								<th scope="col">OT (hour)</th>
 								<td class="inner">0</td>
 								<td class="inner">0</td>
 								<td class="inner">0</td>
 								<td class="inner"></td>
 							</tr>
 							<tr>
 								<th scope="col">DL Need</th>
 								<td class="inner">53</td>
 								<td class="inner">53</td>
 								<td class="inner">0</td>
 								<td class="inner"></td>
 							</tr>
 							<tr>
 								<th scope="col">Direct Eff</th>
 								<td class="inner">120%</td>
 								<td class="inner">110%</td>
 								<td class="inner">120%</td>
 								<td class="inner"></td>
 							</tr>
 						</tbody>
 					</table> 
					<br>
				</div>	
			</div>
		</div>

	</div>
</div>

	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<!-- Spedometer charts -->
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script> 
	<!-- DATE PICKER -->
	<script src="<?php echo base_url() ?>assets/src/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/month-picker/js/plugins.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/month-picker/js/responsive-month-range-picker.js"></script>
	
	<script type="text/javascript">
		$('document').ready(function(){

			// Actual
            	var options ={  
						    chart: {
						        renderTo: 'container'
						    },
						    title: {
						        text: 'Load vs Capacity Planning'
						    },
						    xAxis: {
						        categories: [
						            'Jan',
						            'Feb',
						            'Mar',
						            'Apr',
						            'May',
						            'Jun',
						            'Jul',
						            'Aug',
						            'Sep',
						            'Oct',
						            'Nov',
						            'Dec'
						        ],
						        crosshair: true
						    },
						    yAxis: {
						        min: 0,
						        title: {
						            text: '% Load'
						        }
						    },
						    tooltip: {
						        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
						        footerFormat: '</table>',
						        shared: true,
						        useHTML: true
						    },
						    plotOptions: {
						        column: {
						            pointPadding: 0.2,
						            borderWidth: 0
						        }
						    },
						    series: [
						    	{
						    		type: 'column',
							        name: 'Kap Prod',
							        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
							    }, 
							    {
							    	type: 'column',
							        name: 'Order',
							        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3],
							        color: '#B22625'

							    }, 
							    {
							        type: 'spline',
							        name: '% Load',
							        data: [50, 70, 95, 90, 100,   85,100,105,95,90,   100, 80],
							        marker: {
							            lineWidth: 2,
							            lineColor: Highcharts.getOptions().colors[3],
							            fillColor: 'white'
							      	}
						    	}
						    ],
						    legend: {
								layout: 'vertical',
								align: 'left',
								verticalAlign: 'top',
								x: 70,
								y: -10,
								floating: true,
								borderWidth: 1,
								backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
							}

		            	};
            	var chart = new Highcharts.Chart(options); 

            // Testing
            	var options_tes ={  
						    chart: {
						        renderTo: 'container_testing'
						    },
						    title: {
						        text: 'Load vs Capacity Testing'
						    },
						    xAxis: {
						        categories: [
						            'Jan',
						            'Feb',
						            'Mar',
						            'Apr',
						            'May',
						            'Jun',
						            'Jul',
						            'Aug',
						            'Sep',
						            'Oct',
						            'Nov',
						            'Dec'
						        ],
						        crosshair: true
						    },
						    yAxis: {
						        min: 0,
						        title: {
						            text: '% Load'
						        }
						    },
						    tooltip: {
						        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
						        footerFormat: '</table>',
						        shared: true,
						        useHTML: true
						    },
						    plotOptions: {
						        column: {
						            pointPadding: 0.2,
						            borderWidth: 0
						        }
						    },
						    series: [
						    	{
						    		type: 'column',
							        name: 'Kap Prod',
							        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
							    }, 
							    {
							    	type: 'column',
							        name: 'Order',
							        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
							    }, 
							    {
							        type: 'spline',
							        name: '% Load',
							        data: [50, 70, 95, 90, 100,   85,100,105,95,90,   100, 80],
							        marker: {
							            lineWidth: 2,
							            lineColor: Highcharts.getOptions().colors[3],
							            fillColor: 'white'
							      	}
						    	}
						    ],
						    legend: {
								layout: 'vertical',
								align: 'left',
								verticalAlign: 'top',
								x: 70,
								y: -10,
								floating: true,
								borderWidth: 1,
								backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
							}

		            	};
            	var chart_plan = new Highcharts.Chart(options_tes); 

            // Update val
  
			    $("#tbody_testing").on('dblclick','.inner',function (e) {
			        e.stopPropagation();
			        var currentEle = $(this);
			        var value = $(this).html();
			        updateVal(currentEle, value);
			    });

			    function updateVal(currentEle, value) {
				    $(currentEle).html('<input class="thVal form-control" style="width: 85px;" type="number" value="' + value + '" />');
				    $(".thVal").focus();
				    $(".thVal").select();
				    $(".thVal").keyup(function (event) {
				        if (event.keyCode == 13) {
				            $(currentEle).html( $(".thVal").val() ); 
				            console.log('enter');
				        }
				    });

				    $(document).click(function () {
				    		console.log($(".thVal").val());
				            $(currentEle).html( $(".thVal").val() );
				            // $(currentEle).removeClass("thVal");
				    });
				}

			// OPtion
				$('#select_line').select2({ 
	 				placeholder: 'Pilih Line ',
	 				minimumResultsForSearch: -1
	 				// ,
	 				// data:data

	 			});

	 			// DAtepickers
	 			$('.month_range').datepicker({ 
					language: 'en',
					minView: 'months',
					view: 'months',
					autoClose: true,
					range: true,
					multipleDates: true,
					multipleDatesSeparator: " - ",
					dateFormat: 'MM yyyy', 
					onSelect: function(start, end) {  
						if (end.length==2) {
							console.log('okk');
						}  
					}
				});

		}); 
	</script> 
</body>
</html>