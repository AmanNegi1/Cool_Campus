<div id="output1">People List
    <br>
</div>
<div id="output2"></div>

<script>
    var output1 = document.getElementById('output1');
    var output2 = document.getElementById('output2');

    var hr = new XMLHttpRequest();
    var url = "demo.php";

    //hr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(hr.responseText);
            console.log(myObj);
         
        }
    //}

    hr.open("GET", url, true);
    hr.send();

    console.log(hr);
</script>