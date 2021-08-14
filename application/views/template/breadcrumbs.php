<?php
echo"
<ul class='breadcrumb'>
	<li>
		<i class='ace-icon fa fa-home home-icon'></i>
		<a href='#'>Home</a>
	</li>";
$urisegment = $this->uri->segment(1);
$sql_uri = "select * from tbl_menu where url='$urisegment' ";
$main_uri = $this->db->query($sql_uri)->result();
foreach ($main_uri as $uri){	
	if($uri->is_main_menu != 0){
		$this->db->where('id_menu',$uri->is_main_menu);
		$suburi = $this->db->get('tbl_menu');
		 foreach ($suburi->result() as $subs){
			 echo"	
				<li class='active'>
					<a href=''> ".ucwords($subs->title) ."</a>
				</li>";
		 }
		echo"	
			<li class='active'>
				".ucwords($uri->title) ."
			</li>";		
	}else{
		echo"	
			<li class='active'>
				".ucwords($uri->title) ."
			</li>";
	}
}
echo"</ul>";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
