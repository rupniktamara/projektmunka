<?php
    // a DB kapcsolat létrehozása
    function connectDB() {

        $servername = "127.0.0.1";
        $username = "root"; //TODO: módosítani kell
        $password = "q1w2e3r4";
        $dbname = "baloo";
        $port = "3306";
               
        $mysqli = new mysqli($servername, $username, $password, $dbname, $port);
        return $mysqli; 
    }

    // ez a függvény tetszőleges SQL parancs kiadására használható
    function dbOp_command($mysqli, $sql) {
        $mysqli->query($sql);
    }


    // ez a függvény alapvetően a select SQL parancs kiadására szolgál
    // hívási paraméterek példája:
    //  $sql -> "select id, name, value from table where id > ? and name like ? order by id"
    //  $types -> "ds"  ---- d az szám, s az pedig string
    //  $params -> 100, "%" . param . "%"  
    function dbOp_select($mysqli, $sql, $types, ...$params) {

        mysqli_set_charset($mysqli, "utf8");

        // A kapcsolat vizsgálata
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        // Az SQL parancs preparálása, ügyel az ún. "SQL injection" probléma elhárítására
        $stmt = $mysqli->prepare($sql);
        
        if (strlen($types) > 0) {
            // A bemenő paraméterek hozzárendelése
            $stmt->bind_param($types, ...$params);  
        }

        // Ez a visszatérési érték, ami egy tömb
        $array = [];

        // az SQL parancs futtatása
        $stmt->execute();

        // a futtatás eredményének
        $result = $stmt->get_result();

        // soronként kigyűjti az eredményt
        while ($row = $result->fetch_assoc()) {
            // az eredménytömböt feltölti
            array_push($array, $row);
        }        

        // lezárja az utasítást és a kapcsolatot is
        $stmt->close();
        return $array;
    }

    function dbOp_getRows($mysqli, $sql) {
        $query = mysqli_query($mysqli, $sql );
	
        $rowcount=mysqli_num_rows($query);
        return $rowcount;
    }

    function dbOp_update($mysqli, $sql, $types, ...$params) {
        mysqli_set_charset($mysqli, "utf8");

        // A kapcsolat vizsgálata
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        // Az SQL parancs preparálása, ügyel az ún. "SQL injection" probléma elhárítására
        $stmt = $mysqli->prepare($sql);
        
        if (strlen($types) > 0) {
            // A bemenő paraméterek hozzárendelése
            $stmt->bind_param($types, ...$params);  
        }

        // az SQL parancs futtatása
        $result = $stmt->execute();

        // lezárja az utasítást és a kapcsolatot is
        $stmt->close();
        return $result;
    }
    
    function dbOp_insert($mysqli, $sql, $types, ...$params) {
        mysqli_set_charset($mysqli, "utf8");

        // A kapcsolat vizsgálata
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        // Az SQL parancs preparálása, ügyel az ún. "SQL injection" probléma elhárítására
        $stmt = $mysqli->prepare($sql);
        if (strlen($types) > 0) {
            // A bemenő paraméterek hozzárendelése
            $stmt->bind_param($types, ...$params);  
        }
        // az SQL parancs futtatása
        $stmt->execute();

        // lezárja az utasítást
        $stmt->close();
    }  
?>
