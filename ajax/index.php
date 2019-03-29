<form name="TestForm" action="test.php" method="post">
    First :
    <input type="text" name="fname" id="fname" value="mike" />
    <br> Last :
    <input type="text" name="lname" id="lname" value="smith" />
    <br> Age : :
    <input type="number" name="age" id="age" value="50" />
    <br>
    <input type="button" value="SEND via AJAX" onclick="postData()">
    <input type="submit">
</form>

<div id="output1"></div>
<div id="status">Status</div>

<script>
    var output1 = document.getElementById('output1');
    var astatus = document.getElementById('status');
    
    function postData() {
        var firstName = document.getElementById('fname').value;
        var lastName = document.getElementById('lname').value;
        var age = document.getElementById('age').value;
        var vars = "fname=" + firstName + "&lname=" + lastName + "&age=" + age;
        console.log(vars);
        var hr = new XMLHttpRequest();
        var url = "test.php";
        console.log(hr);
          //hr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
               var myObj = JSON.parse(hr.responseText);
                 astatus.innerHTML =  myObj.xstatus + '  ' + myObj.id;
                if(myObj.connected){
                                     astatus.innerHTML +=  '<br>Connected to Database :)';
                }
                console.log(myObj);
            }
        //}
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         hr.send(vars);
        astatus.innerHTML = "processing ... ";
    }
</script>

