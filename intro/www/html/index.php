<!DOCTYPE html>
  <head>
    <title>Introduction to PHP!</title>
  </head>

  <body>
    <h1><?php echo 'Introduction to PHP! (version: ' . phpversion(); echo ')' ?></h1>
    <input type=button onClick="parent.location='datatypes.php'" value='Datatypes'><br/>
    <input type=button onClick="parent.location='functions.php'" value='Functions'><br/>
    <input type=button onClick="parent.location='scope.php'" value='Scope'><br/>
    <input type=button onClick="parent.location='database.php'" value='Database'>
    <?
    ?>
  </body>
</html>
