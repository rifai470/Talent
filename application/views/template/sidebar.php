<style>
.circle_account {
	float: left;
	width: 35px;
	height: 35px;
	margin: 5px 5px 10px 12px;
	border-radius: 30px;
	text-align: center;
	font-size: 14px;
	padding: 17px 0;
	line-height: 0;
	position: absolute;
	background: #BCBEBF;
	color: #343A40;
	font-family: Helvetica, Arial Black, sans;
}
</style>
<div class="sidebar"> 
  <div class="user-panel mt-3 pb-3 mb-3 d-flex"> 
     <?php if(!empty($this->session->userdata('nama_lengkap'))) { ?>
		<div class="circle_account"><b><?php echo strtoupper(substr($this->session->userdata('nama_lengkap'), 0, 1)); ?></b></div>
	  	<div class="info" style="padding-left: 22%; margin-top: 2%;"> <a href="#" class="d-block"> <?php echo $this->session->userdata('nama_lengkap'); ?></a></div>
	  <?php } else { ?>
	  <div class="circle_account"><b><?php echo strtoupper(substr($this->session->userdata('nama_level'), 0, 1)); ?></b></div>
	  	<div class="info" style="padding-left: 22%; margin-top: 2%;"> <a href="#" class="d-block"> <?php echo $this->session->userdata('nama_level'); ?></a></div>
	  <?php } ?>
  </div>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <?php
        // chek settingan tampilan menu
        $setting = $this->db->get_where('tbl_setting', array('id_setting' => 1))->row_array();
        if ($setting['value'] == 'ya') {
            // cari level user
            $id_user_level = $this->session->userdata('id_user_level');
            $sql_menu = "
			SELECT * 
            FROM tbl_menu 
            WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level= '".$id_user_level."') and is_main_menu=0 and is_aktif='y' ORDER BY title";
        } else {
            $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0 ORDER BY title";
        }

        $main_menu = $this->db->query($sql_menu)->result();

        foreach ($main_menu as $menu) {
            // chek is have sub menu
            $this->db->where('is_main_menu', $menu->id_menu);
			$this->db->order_by('title', 'ASC');
            $this->db->where('is_aktif', 'y');
            $submenu = $this->db->get('tbl_menu');
            if ($submenu->num_rows() > 0) {
                // display sub menu
                echo "<li class='nav-item has-treeview'>
                        <a href='#' class='nav-link'>
						    <i class='nav-icon fas ".$menu->icon." '></i> 
							<p>" . $menu->title . " <i class='right fas fa-angle-left'></i></p>
						</a>
                        <ul class='nav nav-treeview'>";
                		foreach ($submenu->result() as $sub) {
							
						echo "<li class='nav-item'>" . anchor($sub->url, "<i class='far fa-circle nav-icon'></i> " . $sub->title, array('class' => 'nav-link')  ) . "</li>";
                }
                echo "</ul>";
                echo "</li>";
            } else {
                // display main menu
                echo "<li class='nav-item'>";
				echo "<a href='" . $menu->url . "' class='nav-link' >";
				echo "<i class='nav-icon fas ".$menu->icon."'></i><p> ". $menu->title ." </p>";
                echo "</a></li>"; 
				
				/*echo "<li "; 
					if($this->uri->segment(1)=="" . $menu->url . "") {
				 		echo 'class="active"';
					}
				echo	">";
				 echo "" . anchor($menu->url, "<i class='" . $menu->icon . "'></i>&nbsp; " . $menu->title, array('class' => 'nav-link')  ) . "";
                echo "</li>";*/
            }
        }
        ?>
      <li class="nav-item"> <?php echo anchor('auth/logout', "<i class='nav-icon fas fa-sign-out-alt'></i><p>Sign Out</p>", array('class' => 'nav-link')); ?> </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu --> 
</div>
