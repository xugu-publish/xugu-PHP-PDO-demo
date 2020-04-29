

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

    // start transaction 
    $db->beginTransaction();
    $db->exec("INSERT INTO PDO_1TH_TEST VALUES(1, 'TX', '0.0');");

    $stmt = $db->prepare("INSERT INTO PDO_1TH_TEST VALUES(?, 'TX', '0.0');");
    for($i=0; $i!=10; $i++){

            $stmt->bindParam(1, $i, PDO::PARAM_STR);
            $stmt->execute();
    }

    // commit transaction
    $db->commit();

    // rollback transaction
    // $db->rollBack();
   
    /*
     * Both commit() and rollBack() should appear in pairs 
     * with beginTransaction(), that is, a beginTransaction() 
     * function cannot correspond to multiple commit() 
     * or rollBack () 
     *
     */

?>


