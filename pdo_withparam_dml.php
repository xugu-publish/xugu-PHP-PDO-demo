

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

    /*
     *  Bind parameter usage by position 
     */
    $stmt = $db->prepare("INSERT INTO PDO_1TH_TEST VALUES(?,?,?);");

    for($i=0; $i!=10; $i++){    

        $v1=$i; $v2='ACC'; $v3='0.99';
        $stmt->bindParam(1, $v1, PDO::PARAM_INT);
        $stmt->bindParam(2, $v2, PDO::PARAM_STR);
        $stmt->bindParam(3, $v3, PDO::PARAM_STR);
        $stmt->execute();
    }

    /*
     *  Bind parameter usage by name
     */
    $stmt = $db->prepare("INSERT INTO PDO_1TH_TEST VALUES(:V1, :V2, :V3)");
    
    for($i=0; $i!=10; $i++){    

        $v1=$i; $v2='BCC'; $v3='0.99';
        $stmt->bindParam(':V1', $v1, PDO::PARAM_INT);
        $stmt->bindParam(':V2', $v2, PDO::PARAM_STR);
        $stmt->bindParam(':V3', $v3, PDO::PARAM_STR);
        $stmt->execute();
    }

    /*
     *  Storage operations of large object data types
     */

    $stmt = $db->prepare("INSERT INTO PDO_2TH_TEST VALUES(1,?,?);");

    // BLOB 
    $fp = fopen("./LOB/BLOB.png", "r");
    $stmt->bindParam(1, $fp, PDO::PARAM_LOB);

    // CLOB
    $txt = file_get_contents("./LOB/CLOB.txt"); $size = strlen($txt)+1;  
    $stmt->bindParam(2, $txt, PDO::PARAM_STR, $size);
    $stmt->execute();

    fclose($fp);

?>


