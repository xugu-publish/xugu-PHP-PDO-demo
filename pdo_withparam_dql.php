

<?php

/* 
 * +--------------------------------------------+
 * |    PDO xugusql                             | 
 * +--------------------------------------------+
 * |    Date: 2020-04-29    | 
 * +--------------------------------------------+
 *
 * */

    $db = new PDO("xugusql:ip=127.0.0.1;port=5138;".
        "db=SYSTEM;user=SYSDBA;pwd=SYSDBA");
    if($db){
        echo 'Welcome to PHP ...'."\n\n";
    }

    /*
     *    |
     *    +---> General Query 
     */
    $stmt = $db->prepare("SELECT C1,C2,C3 FROM PDO_1TH_TEST WHERE C1=?;");

    // Query data with value 1 in column C1
    $stmt->bindValue(1, 1, PDO::PARAM_STR);
    $stmt->execute();

    // Returns the number of columns in the result set
    $fds = $stmt->columnCount();

    $stmt->bindColumn(1, $relt_1);
    $stmt->bindColumn(2, $relt_2);
    $stmt->bindColumn(3, $relt_3);

    while($row = $stmt->fetch(PDO::FETCH_BOUND)){
        printf("result row: %s, %s, %s\n", $relt_1, $relt_2, $relt_3);
    }

    // The query statements executed by prepare will enable the 
    // cursor by default, and the closeCursor() function should 
    // be actively called at the end to close the cursor
    $stmt->closeCursor();


    /*
     *    |
     *    +---> Query BLOB
     */
    $stmt = $db->prepare("SELECT C2 FROM PDO_2TH_TEST WHERE C1=?;");
    $stmt->bindValue(1, 1, PDO::PARAM_STR);
    $stmt->execute();
    
    // Binding result set
    $stmt->bindColumn(1, $fp, PDO::PARAM_LOB);
    $stmt->fetch(PDO::FETCH_BOUND);

    // The query statements executed by prepare will enable the 
    // cursor by default, and the closeCursor() function should 
    // be actively called at the end to close the cursor
    $stmt->closeCursor();

    $fp2 = fopen("./BLOB.png", "wb");
    while(!feof($fp)){
    
        fwrite($fp2, fgets($fp, 1024));
    }

    // Close file pointer
    fclose($fp2);


    /*
     *    |
     *    +---> Query CLOB
     */
    $stmt = $db->prepare("SELECT C3 FROM PDO_2TH_TEST WHERE C1=?;");
    $stmt->bindValue(1, 1, PDO::PARAM_STR);
    $stmt->execute();

    $stmt->bindColumn(1, $content, PDO::PARAM_STR);
    $stmt->fetch(PDO::FETCH_BOUND);

    // The query statements executed by prepare will enable the 
    // cursor by default, and the closeCursor() function should 
    // be actively called at the end to close the cursor
    $stmt->closeCursor();

    $fp2 = fopen("./CLOB.txt", "w");
    fwrite($fp2, $content);

    // Close file pointer
    fclose($fp2);

?>


