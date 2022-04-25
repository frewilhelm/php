<!DOCTYPE html>
  <head>
    <title>PHP - Database</title>
  </head>

    <body>
      <h1>PHP - Database</h1>


      <form action="database.php" method="post">
        Create a table<br>
        Table: <input type="text" name="table"><br>
        Column: <input type="text" name="column"><br>
        Datatype: <input type="text" name="datatype"><br>
        <input type="submit" name="submit">
      </form>

      <form action="database.php" method="post">
        Insert the data<br>
        Table: <input type="text" name="tableIn"><br>
        Column: <input type="text" name="columnIn"><br>
        Data: <input type="text" name="data"><br>
        <input type="submit" name="submitIn">
      </form>

      <form action="database.php" method="post">
        Select everything from a table<br>
        Table: <input type="text" name="tableOut"><br>
        <input type="submit" name="submitOut">
      </form>

      <?php
        $host = "mysql";
        $db = "mydb";
        $user = "myuser";
        $password = "password";

        // Wait for input
        if (isset($_POST["submit"])){
          try {
            // Create connection
            $conn = new PDO("mysql:host={$host};dbname=$db;charset=utf8", $user, $password);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $table = $_POST["table"];
            $col = $_POST["column"];
            $dt = $_POST["datatype"];
            $sql = "CREATE TABLE $table ($col $dt)";

            $conn->exec($sql);
            echo "Table $table ($col $dt) successfully created<br>";

          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          $conn = null;
        }
      ?>

      <?php
        $host = "mysql";
        $db = "mydb";
        $user = "myuser";
        $password = "password";

        // Wait for input
        if (isset($_POST["submitIn"])){
          try {
            // Create connection
            $conn = new PDO("mysql:host={$host};dbname=$db;charset=utf8", $user, $password);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $table = $_POST["tableIn"];
            $col = $_POST["columnIn"];
            $data = $_POST["data"];
            $sql = "INSERT INTO $table ($col) values ('$data')";

            $conn->exec($sql);
            echo "Successfully inserted '$data' into '$table'<br>";

          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          $conn = null;
        }
      ?>

      <?php

        class TableRows extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
                  return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                    }

          function beginChildren() {
                  echo "<tr>";
                    }

          function endChildren() {
                  echo "</tr>" . "\n";
                     }
        }

        $host = "mysql";
        $db = "mydb";
        $user = "myuser";
        $password = "password";

        // Wait for input
        if (isset($_POST["submitOut"])){
          try {
            // Create connection
            $conn = new PDO("mysql:host={$host};dbname=$db;charset=utf8", $user, $password);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $table = $_POST["tableOut"];
            $stmt = $conn->prepare("SELECT * FROM $table");
            $stmt->execute();

            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>$table</th></tr>";
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
              echo $v;
            }


          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          $conn = null;
        }
      ?>

    </body>
  </html>
