<?php
    session_start();
    echo "<br>";
    include('../function.php');
    $class=$_POST['id'];
    $q="SELECT * FROM attachements where classid = '$class' ORDER BY id ASC";
    $result = mysqli_query($con,$q);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['type2']=='image'){
                echo '
                <div id="classes">
                <img  width="100%" height="30%" src="'.$row['path'].'">
                 '.$row['name'].'
             </div>
             </a>
             <button data-id="'.$row['id'].'" style="color:red;float:right;top:20%;;" id="delete">
             delete
             </button>
             ';
            }
            else if($row['type2']=='pdf'){
           echo '
          
           <div id="classes">
           <a href="'.$row['path'].'">
            '.$row['name'].'
            </a>
            <button data-id="'.$row['id'].'" style="color:red;float:right;top:20%;" id="delete">
            delete
            </button>
        </div>
        

        ';
            }
            else{
                echo '
                <div id="classes">
                <video controls width="100%" height="30%" src="'.$row['path'].'"></video>
                 '.$row['name'].'
             </div>
             </a>
             <button data-id="'.$row['id'].'" style="color:red;float:right;top:20%;;" id="delete">
             delete
             </button>
             ';
            }
    
}
}
    else {
        echo "Sorry there was no attechements found";
    }
    ?>
