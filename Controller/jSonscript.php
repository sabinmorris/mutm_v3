<script>
  fetch("http://localhost:8080/selectUserZone").then(
  res=>{
  res.json().then(
  data=>{
  console.log(data); //send result to the console log, only developer use it for testing
  if(data.length > 0){
  var temp = "";

  data.forEach((l)=>{
  temp += "<tr>";
  temp += "<td>"+l.userzoneid+"</td>";
  temp += "<td>"+l.zoneid+"</td>";
  temp += "<td>"+l.userid+"</td>";
  temp += "<td>"+l.userzonestatus+"</td>";
  temp += "<td><a href='edit.html?id="+l.userzoneid+"'>Edit</a></td>";
  temp += "<td>Delete</td>";

  })
  document.getElementById("UserZoneId").innerHTML = temp;
  }
  }
  )
  }
  )
</script>