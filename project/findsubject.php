<?php
    $sem=$_GET['sem'];
    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"project");
    $qry="select sid,sname from subject where sem='$sem'";
    $res=mysqli_query($link,$qry);  
?>
<select name="subject">
<option value="-1">--Select Subject--</option>
<?php 
    while($row=mysqli_fetch_row($res))
    {
        $str=$row[1]." (".$row[0].")";
        echo "<option value=$row[0]>$str</option>" ;
    }
?>
</select>
