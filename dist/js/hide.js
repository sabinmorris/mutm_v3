//disable Ctr+u & refresh options
function keydown(evt) {
	if( (evt.ctrlKey && evt.keyCode==85) || (evt.ctrlKey && evt.keyCode==82)){
		if(evt.preventDefault){
			evt.preventDefault();
		}else{
			return false;
		}
	}
}
$(document).keydown(keydown);
 
// 85=Ctr+u 82=refresh 