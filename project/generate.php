<html>
<head><title>Genereate Question Paper</title></head>
<script type="text/javascript">
    function getSubject(strURL)
    {
        //alert("here");
        var req=new XMLHttpRequest();
        //alert($req);
        if(req)
        {
            req.onreadystatechange=function()
            {
                
                if(req.readyState==4)
                {
                    //alert("inside");
                    if(req.status==200)
                    {
                        document.getElementById('subdiv').innerHTML=req.responseText;
                    }                    
                    else
                    {
                        alert("There was a problem while using XMLHTTPS:\n "+req.status);
                        
                    }  
                 }
            }
                   
                    req.open("GET",strURL,true);
                    req.send();    
        }
    }
    function check()
    {
        var flag=1;
        var x=document.frm1.sem.value;
        var y=document.frm1.subject.value;
        if(x==-1 || y== -1)
        {
            alert("Select Semester/Subject");
            flag=0;
        }
        //part a
        var ch=0;
        for(i=0;i<8;i++)
         {
            if(document.frm1.parta[i].checked)
            {
                ch=1;
                break;
            }
            else
               { 
                ch=0;
               }
         }
         if(ch == 0)
         {
            alert("Select unit for Part-A");
            flag=0;
         } 
         //part b
        ch=0;
        for(i=0;i<8;i++)
         {
            if(document.frm1.partb[i].checked)
            {
                ch=1;
                break;
            }
            else
               { 
                ch=0;
               }
         }
         if(ch == 0)
         {
            alert("Select unit for Part-B");
            flag=0;
         } 
         
         if(flag==0)
            return false;
         else
            return true;
    }
</script>
<body>
<form name="frm1" action="" method="POST" onsubmit="return check()">
<br/>
<center>
Semester<select name="sem"  onchange="getSubject('findsubject.php?sem='+this.value)" >
<option value="-1">--Select Sem--</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
Subject<span id="subdiv"><select name="subject">
<option value="-1">--Select Subject--</option>
</select></span>
<br />
<br />
<table border="3px">
<tr><td>Choose Part-A(12 marks) units</td><td>Choose Part-B(13 marks) units</td></tr>
<tr><td align="center"><input type="checkbox" name="parta1" value="1" />Unit 1 <br />
    <input type="checkbox" name="parta2" value="2" />Unit 2 <br />    
    <input type="checkbox" name="parta3" value="3" />Unit 3 <br />
    <input type="checkbox" name="parta4" value="4" />Unit 4 <br />
    <input type="checkbox" name="parta5" value="5" />Unit 5 <br />
    <input type="checkbox" name="parta6" value="6" />Unit 6 <br />
    <input type="checkbox" name="parta7" value="7" />Unit 7 <br />
    <input type="checkbox" name="parta8" value="8" />Unit 8 <br /></td>
    
<td align="center"><input type="checkbox" name="partb1" value="1" />Unit 1 <br />
    <input type="checkbox" name="partb2" value="2" />Unit 2 <br />    
    <input type="checkbox" name="partb3" value="3" />Unit 3 <br />
    <input type="checkbox" name="partb4" value="4"  />Unit 4 <br />
    <input type="checkbox" name="partb5" value="5"  />Unit 5 <br />
    <input type="checkbox" name="partb6" value="6"  />Unit 6 <br />
    <input type="checkbox" name="partb7" value="7"  />Unit 7 <br />
    <input type="checkbox" name="partb8" value="8" />Unit 8 <br /></td>
    </tr>
    </table>
    <br />
    <br />
    <input type="submit" name="sub" value="Generate"  />

    </center>

</form>
</body>
</html>
<?php
  if(isset($_POST['sub']))
  {
    $m=1;
    $part='parta';
    $parta=array();
    while($m<=8)
    {
        $temp=$part.$m;
        if(isset($_POST[$temp]))
        {
         array_push($parta,$m);  
        }
        $m=$m+1;
    }
    $m=1;
    $part='partb';
    $partb=array();
    while($m<=8)
    {
        $temp=$part.$m;
        if(isset($_POST[$temp]))
        {
         array_push($partb,$m);  
        }
        $m++;
    }
    //var_dump($parta);
    var_dump($partb);
    $sid=$_POST['subject'];
    echo $sid;
    $marks=array(6,6,8);
    $i=mt_rand()%3;
    $first=$marks[$i];
    $tab1=$first.'M';
    $second=12-$first;
    $tab2=$second.'M';
    $n=array_count_values($parta);
    $link=mysqli_connect("localhost","root","","project");
    $query="select count(*) from $tab1 where sid='$sid' and include=1 and unit IN(".implode(',',$parta).")";
    $query_base="select qno from $tab1 where sid='$sid' and include=1 and unit IN(".implode(',',$parta).")";
    $res_base=mysqli_query($link,$query_base);
    $row_base=mysqli_fetch_row($res_base);
    $base=$row_base[0];
   // echo "base = ".$base;
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_row($res);
    $n=$row[0];
    echo "n=".$n;
    echo "<br>";
    $ans=-1;
    $ans2=-1;
    while($ans==-1 || $ans2==-1)
    { 
     $q1=mt_rand()%$n;
     $q1=$q1+1+$base;
     $q3=$q1;
     while($q3==$q1)
     {
         $q3=mt_rand()%$n;
         $q3=$q3+1+$base;
     }
     $query1="select question from $tab1 where qno=$q1 and include=1 and sid='$sid' and unit IN(".implode(',',$parta).")";
     $query3="select question from $tab1 where qno=$q3 and include=1 and sid='$sid' and unit IN(".implode(',',$parta).")";
     if($ans==-1)
       $res1=mysqli_query($link,$query1);
     if($ans2==-1)
       $res3=mysqli_query($link,$query3);
     
     if($res1 and $ans==-1)
     {  
        $row1=mysqli_fetch_row($res1);
        $ans=mysqli_num_rows($res1);
        if($row1[0]=='')
            $ans=-1;
     }
     
     if($res3 and $ans2==-1)
     {  
        $row3=mysqli_fetch_row($res3);
        $ans2=mysqli_num_rows($res3);
        if($row3[0]=='')
            $ans2=-1;
     }
     
    }
    echo "1a)".$row1[0];
    echo "<br>";
    echo "2a)".$row3[0];
    echo "<br>";
    
    $ans=-1;
    $query="select count(*) from $tab2 where sid='$sid' and include=1 and unit IN(".implode(',',$parta).")";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_row($res);
    $n=$row[0];
    $ans2=-1;
    
    $query_base="select qno from $tab2 where sid='$sid' and include=1 and unit IN(".implode(',',$parta).")";
    $res_base=mysqli_query($link,$query_base);
    $row_base=mysqli_fetch_row($res_base);
    $base=$row_base[0];
 //   echo "base = ".$base;
    
    
    while($ans==-1 or $ans2==-1)
    { 
        //echo "am in the second loop";
     $q2=mt_rand()%$n;
     $q2=$q2+$base;
     $q4=$q2;
     while($q4==$q2)
     {
         $q4=(mt_rand()%$n)+$base;
     }
     $query2="select question from $tab2 where qno=$q2 and include=1 and sid='$sid' and unit IN(".implode(',',$parta).")";
     if($ans==-1)
      $res2=mysqli_query($link,$query2);
     $query4="select question from $tab2 where qno=$q4 and include=1 and sid='$sid' and unit IN(".implode(',',$parta).")";
     if($ans==-1)
      $res4=mysqli_query($link,$query4);
     
     if($res2 and $ans==-1)
     {  
        $row2=mysqli_fetch_row($res2);
        $ans=mysqli_num_rows($res2);
        if($row2[0]=='')
            $ans=-1;
     } 
     
     if($res4 and $ans2==-1)
     {  
        $row4=mysqli_fetch_row($res4);
        $ans2=mysqli_num_rows($res4);
        if($row4[0]=='')
            $ans2=-1;
     } 
     
     
    }
    echo "1b)".$row2[0];
    echo "<br>";
    echo "2b)".$row4[0];
    echo " ";
    echo "</br>";
    echo $n;
    
    
    //selecting part B questions
    
    $marks=array(6,7,7);
    $i=mt_rand()%3;
    $first=$marks[$i];
    $tab1=$first.'M';
    $second=13-$first;
    $tab2=$second.'M';
    $n=array_count_values($partb);
    $link=mysqli_connect("localhost","root","","project");
    $query="select count(*) from $tab1 where sid='$sid' and include=1 and unit IN(".implode(',',$partb).")";
    $query_base="select qno from $tab1 where sid='$sid' and include=1 and unit IN(".implode(',',$partb).")";
    $res_base=mysqli_query($link,$query_base);
    $row_base=mysqli_fetch_row($res_base);
    $base=$row_base[0];
   // echo "base = ".$base;
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_row($res);
    $n=$row[0];
    echo "n=".$n;
    echo "<br>";
    $ans=-1;
    $ans2=-1;
    while($ans==-1 || $ans2==-1)
    { 
     $q1=mt_rand()%$n;
     $q1=$q1+$base;
     $q3=$q1;
     while($q3==$q1)
     {
         $q3=mt_rand()%$n;
         $q3=$q3+$base;
     }
     $query1="select question from $tab1 where qno=$q1 and include=1 and sid='$sid' and unit IN(".implode(',',$partb).")";
     $query3="select question from $tab1 where qno=$q3 and include=1 and sid='$sid' and unit IN(".implode(',',$partb).")";
     if($ans==-1)
       $res1=mysqli_query($link,$query1);
     if($ans2==-1)
       $res3=mysqli_query($link,$query3);
     
     if($res1 and $ans==-1)
     {  
        $row1=mysqli_fetch_row($res1);
        $ans=mysqli_num_rows($res1);
        if($row1[0]=='')
            $ans=-1;
     }
     
     if($res3 and $ans2==-1)
     {  
        $row3=mysqli_fetch_row($res3);
        $ans2=mysqli_num_rows($res3);
        if($row3[0]=='')
            $ans2=-1;
     }
     
    }
    echo "3a)".$row1[0];
    echo "<br>";
    echo "4a)".$row3[0];
    echo "<br>";
    
    $ans=-1;
    $query="select count(*) from $tab2 where sid='$sid' and include=1 and unit IN(".implode(',',$partb).")";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_row($res);
    $n=$row[0];
    $ans2=-1;
    
    $query_base="select qno from $tab2 where sid='$sid' and include=1 and unit IN(".implode(',',$partb).")";
    $res_base=mysqli_query($link,$query_base);
    $row_base=mysqli_fetch_row($res_base);
    $base=$row_base[0];
 //   echo "base = ".$base;
    
    
    while($ans==-1 or $ans2==-1)
    { 
        //echo "am in the second loop";
     $q2=mt_rand()%$n;
     $q2=$q2+$base;
     $q4=$q2;
     while($q4==$q2)
     {
         $q4=(mt_rand()%$n)+1+$base;
     }
     $query2="select question from $tab2 where qno=$q2 and include=1 and sid='$sid' and unit IN(".implode(',',$parta).")";
     if($ans==-1)
      $res2=mysqli_query($link,$query2);
     $query4="select question from $tab2 where qno=$q4 and include=1 and sid='$sid' and unit IN(".implode(',',$parta).")";
     if($ans==-1)
      $res4=mysqli_query($link,$query4);
     
     if($res2 and $ans==-1)
     {  
        $row2=mysqli_fetch_row($res2);
        $ans=mysqli_num_rows($res2);
        if($row2[0]=='')
            $ans=-1;
     } 
     
     if($res4 and $ans2==-1)
     {  
        $row4=mysqli_fetch_row($res4);
        $ans2=mysqli_num_rows($res4);
        if($row4[0]=='')
            $ans2=-1;
     } 
     
     
    }
    echo "3b)".$row2[0];
    echo "<br>";
    echo "4b)".$row4[0];
    echo " ";
    echo "</br>";
        
  }       
?>