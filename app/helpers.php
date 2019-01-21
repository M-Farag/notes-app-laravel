<?php
function flash($message){
	session()->flash('message',$message);
}

function iconLoader($type){
	if($type == 'camera'){
		echo '<i class="fas fa-camera fa-sm icon-color" title="Has image"></i>';
	}
}