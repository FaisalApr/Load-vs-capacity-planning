<?php 

 function getWidgetDl($sai,$start,$end)
	{ 
		$ci =& get_instance();
		$ci->load->model('Simulasi_model');

		// Fungsi Sorting Tanggal
			function cmname($a, $b)
			{
			    $a = $a['idlst']; 
			    $b = $b['idlst']; 

			    if ($a == $b) {
			        return 0;
			    }
			    return ($a < $b) ? -1 : 1;
			}
			function cmp($a, $b)
			{
			    $a = $a['tanggal']; //date('Y-m-d', strtotime() );
			    $b = $b['tanggal']; //date('Y-m-d', strtotime() );

			    if ($a == $b) {
			        return 0;
			    }
			    return ($a < $b) ? -1 : 1;
			}
 		
 		$mSai = array();
		$dataS  =  $ci->Simulasi_model->getLstCarlineSai($sai);  
		foreach ($dataS as $ky => $vl) {
			// Mencari Data Di Setiap Carline
			$data  =  $ci->Simulasi_model->cariDataCarlineTerpilih($vl->id); 
			$atemp = array();
			$mDataCL = array();
			foreach ($data as $key => $value) {  
				$dat = $ci->Simulasi_model->cariDataByListCr($value->id,$start,$end);
				$x= 0;
				// Menggabungkan Data AB
				foreach ($dat as $y => $v) {
					// tgl 
					if ($x==0) {
						$u_dat = array(  
								'idlst' => $v->id_carline_has_line,
								'shift_qty' => $v->shift_qty,
								'mp_dl' => $v->mp_dl,
								'mp_idl' => $v->mp_idl,
								'umh_shift' => $v->umh_shift,
								'working_days' => $v->working_days,
								'order_monthly' => $v->order_monthly,
								'capacity' => $v->umh_shift,
								'balance' => $v->balance,
								'p_load' => $v->p_load,
								'ot_plan' => $v->ot_plan,
								'ot_hours' => $v->ot_hours,
								'efficiency' => $v->efficiency, 
								'exc_time' => $v->exc_time,
								'tot_productivity' => $v->tot_productivity,
								'tanggal' => $v->tanggal, 
								'mpbuffer' => $v->mpbuffer,
								'attendance' => $v->attendance,
								'downtime' => $v->downtime
								); 
						array_push($atemp, $u_dat);

					}else if($v->tanggal == $atemp[sizeof($atemp)-1]['tanggal']){
						$u_dat = array(  
								'idlst' => $v->id_carline_has_line,
								'shift_qty' => $v->shift_qty,
								'mp_dl' => ($atemp[sizeof($atemp)-1]['mp_dl']+$v->mp_dl)/$v->shift_qty,
								'mp_idl' => ($atemp[sizeof($atemp)-1]['mp_idl']+$v->mp_idl)/$v->shift_qty,
								'umh_shift' => $v->umh_shift,
								'working_days' => $v->working_days,
								'order_monthly' => ($atemp[sizeof($atemp)-1]['order_monthly']+ $v->order_monthly),
								'capacity' => ($atemp[sizeof($atemp)-1]['capacity']+ $v->umh_shift),
								'balance' => $atemp[sizeof($atemp)-1]['balance']+$v->balance,
								'p_load' => $v->p_load,
								'ot_plan' => $v->ot_plan,
								'ot_hours' => $atemp[sizeof($atemp)-1]['ot_hours']+$v->ot_hours,
								'efficiency' => $v->efficiency, 
								'exc_time' => $v->exc_time,
								'tot_productivity' => $v->tot_productivity,
								'tanggal' => $v->tanggal, 
								'mpbuffer' => $v->mpbuffer,
								'attendance' => $v->attendance,
								'downtime' => $v->downtime
								); 
						$atemp[sizeof($atemp)-1] =  $u_dat;
					}else if($v->tanggal != $atemp[sizeof($atemp)-1]['tanggal']){
						$u_dat = array(  
								'idlst' => $v->id_carline_has_line,
								'shift_qty' => $v->shift_qty,
								'mp_dl' => $v->mp_dl,
								'mp_idl' => $v->mp_idl,
								'umh_shift' => $v->umh_shift,
								'working_days' => $v->working_days,
								'order_monthly' => $v->order_monthly,
								'capacity' => $v->umh_shift,
								'balance' => $v->balance,
								'p_load' => $v->p_load,
								'ot_plan' => $v->ot_plan,
								'ot_hours' => $v->ot_hours,
								'efficiency' => $v->efficiency, 
								'exc_time' => $v->exc_time,
								'tot_productivity' => $v->tot_productivity,
								'tanggal' => $v->tanggal, 
								'mpbuffer' => $v->mpbuffer,
								'attendance' => $v->attendance,
								'downtime' => $v->downtime
								); 
						array_push($atemp, $u_dat);
					}	
					$x++;
				} 
			}
			// SOrting Tanggal 
				usort($atemp, "cmname");
				usort($atemp, "cmp");
			// mangambil total setiap Carline
				$i=0; $sf=1; $ti=1; $tg='';
				foreach ($atemp as $k => $v) { 
					$tgl = $v['tanggal'];
					// awal GET
					if ($i==0) {  
						$tg = $tgl;  
						//in local DB  
							$u_dat = array(  
										'shift_qty' => $v['shift_qty'], 
										'mp_dl' => $v['mp_dl'],
										'mp_idl' => $v['mp_idl'],
										'umh_shift' => $v['umh_shift'],
										'working_days' => $v['working_days'],
										'order_monthly' => $v['order_monthly'],
										'capacity' => $v['umh_shift'],
										'balance' => $v['balance'],
										'p_load' => $v['p_load'],
										'ot_plan' => $v['ot_plan'],
										'ot_hours' => $v['ot_hours'],
										'efficiency' => $v['efficiency'], 
										'exc_time' => $v['exc_time'],
										'tot_productivity' => $v['tot_productivity'],
										'tanggal' => $v['tanggal'], 
										'mpbuffer' => $v['mpbuffer'],
										'attendance' => $v['attendance'],
										'downtime' => $v['downtime']
									);
							array_push($mDataCL, $u_dat);
					} 
					// jika ini sama dengan sebelumya beda sif
					else if ($tg == $tgl ) { 
						$last = ( sizeof($mDataCL)-1 );  
						// Hitung Untuk Nilai median (%load
							$pload = $mDataCL[$last]['p_load']+ $v['p_load'];
							$eff = $mDataCL[$last]['efficiency']+ $v['efficiency'];
							// Mengetahui batas bulann 
							if ( $i == ( sizeof($atemp)-1) ) { 
									$pload = $pload/$ti;
									$eff = $eff/$ti;
							}else{
								$tgo = $atemp[$i+1]['tanggal']; 

								if ( $tgl != $tgo ) { 
				    				$pload = $pload/$ti;
				    				$eff = $eff/$ti;
				    				$ti=0;
				    			}
							} 	
						// Isi A  
							$u_dat = array( 
									'shift_qty' => $v['shift_qty'],
									'mp_dl_tmp' => $v['mp_dl'], //temp for total in carline
									'mp_dl' => $mDataCL[$last]['mp_dl']+$v['mp_dl'],
									'mp_idl' => $mDataCL[$last]['mp_idl']+$v['mp_idl'],
									'umh_shift' => $mDataCL[$last]['umh_shift']+$v['umh_shift'],
									'working_days' =>  $v['working_days'],
									'order_monthly' => $mDataCL[$last]['order_monthly']+$v['order_monthly'],
									'capacity' => $mDataCL[$last]['umh_shift']+$v['umh_shift'],
									'balance' => $mDataCL[$last]['balance']+$v['balance'],
									'p_load' => $mDataCL[$last]['p_load']+$v['p_load'],
									'ot_plan' => $mDataCL[$last]['ot_plan']+$v['ot_plan'],
									'ot_hours' => $mDataCL[$last]['ot_hours']+$v['ot_hours'], 
									'efficiency' => $eff, 
									'exc_time' => $mDataCL[$last]['exc_time']+$v['exc_time'],
									'tot_productivity' => $mDataCL[$last]['tot_productivity']+$v['tot_productivity'], 
									'mpbuffer' => $mDataCL[$last]['mpbuffer']+$v['mpbuffer'],
									'attendance' => $mDataCL[$last]['attendance']+$v['attendance'],
									'downtime' => $mDataCL[$last]['downtime']+$v['downtime'],
									'tanggal' => $v['tanggal']
								);
							$mDataCL[$last] = $u_dat;
					}
					//  Blan baru
					else if ( $tg != $tgl ){ 
						$tg = $tgl; 
						//in local DB  
							$u_dat = array(
										'shift_qty'=> $v['shift_qty'],
										'mp_dl_tmp'=> $v['mp_dl'], //temp for total in carline
										'mp_dl'=> $v['mp_dl'],
										'mp_idl'=> $v['mp_idl'],
										'umh_shift'=> $v['umh_shift'],
										'working_days'=> $v['working_days'],
										'order_monthly'=> $v['order_monthly'],
										'capacity'=> $v['capacity'],
										'balance'=> $v['balance'],
										'p_load'=> $v['p_load'],
										'ot_plan'=> $v['ot_plan'],
										'ot_hours'=> $v['ot_hours'],
										'efficiency'=> $v['efficiency'], 
										'exc_time'=> $v['exc_time'],
										'tot_productivity'=> $v['tot_productivity'],
										'tanggal'=> $v['tanggal'], 
										'mpbuffer'=> $v['mpbuffer'],
										'attendance'=> $v['attendance'],
										'downtime'=> $v['downtime']
									);
							array_push($mDataCL, $u_dat); 
					} 

					// jika sif sesuai 
					if ($v['shift_qty'] == $sf) {
						$sf=0; 
					}

					$i++;
					$sf++;
					$ti++;
				} 
			$tot_dl = 0; $tot_idl=0; $tot_cap=0; $tot_month=0;
				foreach ($mDataCL as $key => $value) {
					$tot_dl += $value['mp_dl'];
					$tot_idl += $value['mp_idl'];
					$tot_cap += $value['capacity'];
					$tot_month += $value['order_monthly'];
				}
			array_push($mSai, array( 
								'name' => $vl->nama_carline, 
								'isi' => $mDataCL,
								'total_dl' => $tot_dl,
								'total_idl' => $tot_idl,
								'to_capacity' => $tot_cap,
								'to_monthly' => $tot_month
							) );
		} 
		return $mSai;
	} 
?>