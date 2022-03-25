document.getElementById("stlAttendance-submit-1").onclick = function () {
    var teams = [];
    var count = 0;
    for (i = 0; i < stlTable.length; i++) {
      teams[i] = {};
      if(document.getElementById("StlAttonWork_text"+i).checked){
        teams[i]['onwork'] = 1;
        count += 1;
      }
      else{
        teams[i]['onwork'] = 0;
      }
    }
      if(count != 2){
        document.getElementById("StlAttonWork_text0").setCustomValidity("Please insert two service team leaders on work");
        document.getElementById("StlAttonWork_text0").reportValidity();
      } else {
        document.getElementById("StlAttonWork_text0").setCustomValidity("");
        console.log(teams);
        window.location = "/employee/insertStlAttendance/" + JSON.stringify(teams);
      }
  };