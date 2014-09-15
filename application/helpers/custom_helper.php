<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function active_menu_class($page_url='',$current_url= '',$position=''){
	
	$Global_Inst =  & get_instance();
	$active = '';
	if($current_url == ''){
		$current_url = 3;
		}
	if($Global_Inst->uri->segment($current_url)=="" || $page_url==$position ){
		 
			$current_page = 'index';
		}
	else{
			$current_page = $Global_Inst->uri->segment($current_url);
		}	
 	if($page_url == $current_page ){
		$active =  'active';
		}	
 	return 	$active;
	} 
/* End of file custom_helper.php */
/* Location: ./system/application/helpers/custom_helper.php */