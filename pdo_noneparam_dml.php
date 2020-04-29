

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

    /* Execute a non-query SQL statement with no parameters */
    $db->exec("INSERT INTO PDO_1TH_TEST VALUES(1, 'AKJ', '10.00');");
    $last_id = $db->lastInsertId();
    printf("1th:%s\n", $last_id);

    $db->exec("INSERT INTO PDO_1TH_TEST VALUES(2, 'BKJ', '10.00');");
    $last_id = $db->lastInsertId();
    printf("2th:%s\n", $last_id);

    $db->exec("INSERT INTO PDO_1TH_TEST VALUES(3, 'CKJ', '10.00');");
    $last_id = $db->lastInsertId();
    printf("3th:%s\n", $last_id);


    /* UPDATE */
    $effect_rows = $db->exec("UPDATE PDO_1TH_TEST SET C3='10.00' WHERE C3='10.00';");
    if($effect_rows != 0) {

        echo "effect_rows: ".$effect_rows;
    }

?>


