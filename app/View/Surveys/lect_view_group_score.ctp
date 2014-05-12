<?php 
    include '/navbar/lectNavBar.php';
?>

<div class="surveys lectviewGroupScore">
    
    <?php echo "Course: ".$otherInfo['cCodeName'];?> <br/>
    <?php echo "Group: ".$otherInfo['gName'];?> <br/>
    <?php echo "Semesters: ".$otherInfo['semFName'];?> <br/><br/>
    
    <script type="text/javascript">
        window.onload = function()
        {
            BI();
        };
    </script>
    
    <script type="text/javascript">
        function BI()
        {
                //alert("BI");
                var elemArray = document.getElementsByClassName("BI");
                for(var i = 0; i < elemArray.length; i++)
                {
                    var elem = document.getElementById(elemArray[i].id);
                    document.getElementById(elem.id).style.display="block";
                }

                var elemArray = document.getElementsByClassName("BM");
                for(var i = 0; i < elemArray.length; i++)
                {
                    var elem = document.getElementById(elemArray[i].id);
                    document.getElementById(elem.id).style.display="none";
                }

        }

        function BM()
        {
                var elemArray = document.getElementsByClassName("BI");
                for(var i = 0; i < elemArray.length; i++)
                {
                    var elem = document.getElementById(elemArray[i].id);
                    document.getElementById(elem.id).style.display="none";
                }

                var elemArray = document.getElementsByClassName("BM");
                for(var i = 0; i < elemArray.length; i++)
                {
                    var elem = document.getElementById(elemArray[i].id);
                    document.getElementById(elem.id).style.display="block";
                }
        }
    </script>
    
    <div class="btn-group" data-toggle="buttons-radio">
        <button type="button" class="btn btn-primary" onclick="BI()"> English </button>
        <button type="button" class="btn btn-primary" onclick="BM()"> Malay </button>
    </div>
    
    <table class="table table-hover">
	<tr>
            <th>No.</th>
            <th> <div id="11" class="BM" align="center"> Soalan </div> <div id="12" class="BI" align="center"> Question </div> </th>
            <th> <div id="21" class="BM" align="center"> Sangat Tidak Bersetuju </div> <div id="22" class="BI" align="center"> Strongly Disagree </div> </th>
            <th> <div id="31" class="BM" align="center"> Tidak Bersetuju </div> <div id="32" class="BI" align="center"> Disagree </div> </th>
            <th> <div id="41" class="BM" align="center"> Setuju </div> <div id="42" class="BI" align="center"> Agree </div> </th>
            <th> <div id="51" class="BM" align="center"> Sangat Bersetuju </div> <div id="52" class="BI" align="center"> Strongly Agree </div> </th>
            <th> <div id="61" class="BM" align="center"> Purata </div> <div id="62" class="BI" align="center"> Average </div> </th>
	</tr>
        <tr>
            <th colspan="2"></th>
            <th><center>1</center></th>
            <th><center>2</center></th>
            <th><center>3</center></th>
            <th><center>4</center></th>
            <th></th>
        </tr>
        <?php //print_r($scoresArray); ?>
	<?php foreach ($scoresArray as $markah): ?>
        
        <?php if($markah['qNum'] == 1){ ?>
        <tr class="info">
            <td colspan="7"> <div id="PABM" class="BM"> Bahagian A : Persepsi Keseluruhan tentang kursus ini </div> <div id="PABI" class="BI">Section A : Overall Impression about the course</div></td>
        </tr>
        <?php }?>
        
	<tr>
            <td><center><?php echo $markah['qNum'];?></center></td>
            <td>
                 <div id="<?php echo "q".$markah['qNum']."BM"; ?>" class="BM"> <?php echo $markah['qDesc']; ?> </div>
                 <div id="<?php echo "q".$markah['qNum']."BI"; ?>" class="BI"> <?php echo $markah['qDescBI']; ?> </div>
            </td>
            <td><center><?php echo $markah['totalVal1']; ?></center></td>
            <td><center><?php echo $markah['totalVal2']; ?></center></td>
            <td><center><?php echo $markah['totalVal3']; ?></center></td>
            <td><center><?php echo $markah['totalVal4']; ?></center></td>
            <td><center><?php echo $markah['average']; ?></center></td>
	</tr>
        
        <?php if($markah['qNum'] == 3){ ?>
        <tr>
            <td></td>
            <td colspan="5"> <b> <div id="AVGABM" class="BM"> Jumlah Purata Bahagian A:</div> <div id="AVGABI" class="BI"> Total Average Part A: </div> </b> </td>
            <td> <center> <?php echo $averagePart['avgPartA']; ?> </center> </td>
        </tr>
        
        <tr class="info">
            <td colspan="7"> <div id="PBBM" class="BM"> Bahagian B : Profesionalisma Pensyarah </div> <div id="PBBI" class="BI"> Section B : Lecturer Professionalism</div> </td>
        </tr>
        <?php }?>
        
        <?php if($markah['qNum'] == 12){ ?>
        <tr>
            <td></td>
            <td colspan="5"> <b> <div id="AVGBBM" class="BM"> Jumlah Purata Bahagian B:</div> <div id="AVGBBI" class="BI"> Total Average Part B: </div> </b> </td>
            <td> <center> <?php echo $averagePart['avgPartB']; ?> </center> </td>
        </tr>
        
        <tr class="info">
            <td colspan="7"> <div id="PCBM" class="BM">Bahagian C: Aktiviti Pengajaran dan Pembelajaran </div> <div id="PCBI" class="BI"> Section C : Teaching and Learning Activities </div> </td>
        </tr>
        <?php }?>
        
        <?php if($markah['qNum'] == 23){ ?>
        <tr>
            <td></td>
            <td colspan="5"> <b> <div id="AVGCBM" class="BM"> Jumlah Purata Bahagian C:</div> <div id="AVGCBI" class="BI"> Total Average Part C: </div> </b> </td>
            <td> <center> <?php echo $averagePart['avgPartC']; ?> </center> </td>
        </tr>
        
        <tr class="info">
            <td colspan="7"> <div id="PSBM" class="BM"> Bahagian D : Infrastruktur </div> <div id="PDBI" class="BI"> Section D : Infrastructure </div> </td>
        </tr>
        <?php }?>
        
        <?php if($markah['qNum'] == 25){ ?>
        <tr>
            <td></td>
            <td colspan="5"> <b> <div id="AVGDBM" class="BM"> Jumlah Purata Bahagian D:</div> <div id="AVGDBI" class="BI"> Total Average Part D: </div> </b> </td>
            <td> <center> <?php echo $averagePart['avgPartD']; ?> </center> </td>
        </tr>
        <?php }?>
        
        <?php endforeach; ?>
	</table>
    <br/>

</div>