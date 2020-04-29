

<?php

/* 
 * +--------------------------------------------+
 * |    PDO xugusql                             | 
 * +--------------------------------------------+
 * |    Date: 2020-04-29    | 
 * +--------------------------------------------+
 *
 * */

    $db = new PDO('xugusql:ip=127.0.0.1;port=5138;db=SYSTEM;user=SYSDBA;pwd=SYSDBA');
    if($db){
        echo 'Welcome to PHP ...'."\n\n";
    }

    foreach($db->query("SELECT C2,C3 FROM PDO_1TH_TEST;") as $row){
        
        printf("c2 field of pdo_1th_test: %s, %s\n", $row[0], $row[1]);
    }

?>


