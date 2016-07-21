<html>
<head>
<script type=text/javascript>
function fail()
{
    alert("failed to insert into the database");
}
function fun()
{
    var flag=1;
    var x=document.formAQ.question.value;
    var y=document.formAQ.marks.value;
    if(y=="--Select marks--")
    {
     alert("Please enter the marks");
     flag=0;
    }   
    if(x=="")
    {
     alert("Please enter the question");
     flag=0;
    }
    if(flag==0)
        return false
    else
        return true;
}

</script> 
 </head>
<body>
<form name=formAQ method=POST onsubmit="return fun()">
<fieldset>
<legend> Question bank </legend>
<?php
$sid=$_GET['sid'];
$unit=$_GET['unit'];
//echo $unit;
$link=mysqli_connect("localhost","root","","project");
$query="select qno,question,image,unit from 4M where sid='$sid' and unit='$unit'";
$res=mysqli_query($link,$query);
$query1="select qno,question,image,unit from 6M where sid='$sid' and unit='$unit'";
$res1=mysqli_query($link,$query1);
$query2="select qno,question,image,unit from 7M where sid='$sid' and unit='$unit'";
$res2=mysqli_query($link,$query2);
$query3="select qno,question,image,unit from 8M where sid='$sid' and unit='$unit'";
$res3=mysqli_query($link,$query3);
$query4="select qno,question,image,unit from 10M where sid='$sid' and unit='$unit'";
$res4=mysqli_query($link,$query4);

echo "<table border =3px cellspacing=3px cellpading=3px>";
echo "<tr> <th> Question </th> <th> image </th> <th> Unit </th> <th> marks </th> </tr>";
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res))
{
    echo "<tr> <td> $question </td> <td> $image </td> <td> $unit </td> <td> 4 </td> </tr> ";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res1))
{
    echo "<tr> <td> $question </td> <td> $image </td> <td> $unit </td> <td> 6 </td> </tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res2))
{
    echo "<tr>  <td> $question </td> <td> $image </td> <td> $unit </td> <td> 7 </td> </tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res3))
{
    echo "<tr><td> $question </td> <td> $image </td> <td> $unit </td> <td> 8 </td> </tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res4))
{
    echo "<tr>  <td> $question </td> <td> $image </td> <td> $unit </td> <td> 10 </td> </tr>";
}
echo "</table>";
?>
</fieldset>
<br><br>
Question <textarea name=question rows="4" cols="50"> </textarea>  
 Marks <select name=marks>
 <option selected>--Select marks--</option>
<option >4</option> 
 <option>6</option> 
 <option>7</option> 
 <option>8</option> 
 <option>10</option> 
 </select>
<center>
<br>
<input type=submit name=add value="Add Question">
<br> <br>
<input type=submit name=sub>
</center>
</form>
</body>
</html>

<?php
if(isset($_POST['add']))
{
    $sid=$_GET['sid'];
    $unit=$_GET['unit'];
    $question=$_POST['question'];
    $marks=$_POST['marks'];
    $tabname="$marks"."M";
    $image="";
    /*echo $marks;
    echo $tabname;*/
    $link=mysqli_connect("localhost","root","","project");
    $query="insert into $tabname (question,image,unit,sid) values('$question','$image','$unit','$sid')";
    $res=mysqli_query($link,$query);
    if($res)
        header("location:/project/add.php?sid=$sid&unit=$unit");
    else
        echo "<script type=text/javascript>","fail();","</script>";
}
?>
