<ul class="nav nav-list">
    <li class="center responsive"><img src="
        <?php
            if(empty($this->session->userdata('images'))){
                echo"".base_url()."assets/foto_profil/people.png";
            }else{
                echo "".base_url()."assets/foto_profil/".$this->session->userdata('images')."";
            }
        ?>" class="img-circle" alt="User Image" style="width: 100px;"></li>
    <li style="color: white; text-align: center;background-color: grey;"><b><?php echo $this->session->userdata('nama'); ?></b></li>
	<?php
        $setting = $this->db->get_where('tbl_setting',array('id_setting'=>1))->row_array();
        if($setting['value']=='ya'){
            // cari level user
            $id_user_level = $this->session->userdata('id_user_level');
            $sql_menu = "SELECT * 
						FROM tbl_menu 
						WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y'";
        }else{
            $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0";
        }
        $main_menu = $this->db->query($sql_menu)->result();
		foreach ($main_menu as $menu){
            // chek is have sub menu
            $ceksub = $this->db->query("SELECT is_main_menu FROM tbl_menu WHERE url='".$this->uri->segment(1)."' ")->result();
            $submenu = $this->db->query("SELECT * 
                        FROM tbl_menu 
                        WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu='$menu->id_menu' and is_aktif='y'");

            if($submenu->num_rows()>0){
                // display sub menu
                $active = "";
                foreach ($ceksub as $ceks) {
                     if($ceks->is_main_menu == $menu->id_menu){
                        $active = "active open";
                    }else{
                        $active = "";
                    }
                }               
                echo "<li class='$active'>
                        <a href='#' class='dropdown-toggle'>
                            <i class='menu-icon $menu->icon'></i> 
							<span class='menu-text'>".ucwords($menu->title)."</span>
							<b class='arrow fa fa-angle-down'></b>
                        </a>						
                        <ul class='submenu'>";
                        foreach ($submenu->result() as $sub){                            
                            if($sub->url == $this->uri->segment(1)){
                                $actives = "active";
                            }else{
                                $actives = "";
                            }
                            echo "<li class='$actives'>".anchor($sub->url,"<i class='menu-icon fa fa-caret-right'></i> ".ucwords($sub->title))."<b class='arrow'></b></li>"; 
                        }
                        echo" </ul>
                    </li>";
            }else{
                if($menu->url == $this->uri->segment(1)){
                    $active = "active";
                }else{
                    $active = "";
                }
                // display main menu
                echo "<li class='$active'>";
                echo anchor($menu->url,"<i class='menu-icon ".$menu->icon."'></i> <span class='menu-text'>".ucwords($menu->title)."</span>");
                echo "<b class='arrow'></b></li>";
            }
        }
        if($this->session->userdata('id_user_level')!=3){
        // echo "<li class='' >
        //         <a href='".base_url('livechat/php/app.php?login')."' target='_blank' ><i class='menu-icon fa fa-comments'></i> <span class='menu-text'>".ucwords('Live Chat')."</span></a>";
        // echo "<b class='arrow'></b></li>";
        }
        echo "<li class=''>";
        echo anchor(base_url('auth/logout'),"<i class='menu-icon fa fa-sign-out'></i> <span class='menu-text'>".ucwords('Logout')."</span>");
        echo "<b class='arrow'></b></li>";
	?>
</ul>