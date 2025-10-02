//function to refresh dashboard after every 5 minutes
setInterval(function() {
  //your jQuery ajax code
  // alert('dashboard will be refreshed after every 5 minutes');
  	$.ajax({
	    url:"dashboard.php", //CODE TO GET REG NAME
	    type:"POST",
	    data:{refDash:'refreshDashboard'}, //ELEMENT ID WHERE I GET VALUE
	        success:function(data){
	        $("#dashboard").html(data); //WHERE RESULT WILL BE DISPLAYED
	    }
	});
}, 1000 * 60 * 5); // where X is your every 5 minutes