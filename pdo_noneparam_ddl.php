

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
    $db->exec("CREATE TABLE PDO_1TH_TEST(C1 INT, C2 VARCHAR, C3 NUMERIC(4,2));");
    $db->exec("CREATE TABLE PDO_2TH_TEST(C1 INT, C2 BLOB, C3 CLOB);");

?>


