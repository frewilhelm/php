<!DOCTYPE html>
  <head>
    <title>PHP - Datatypes</title>
  </head>

  <body>
    <h1>PHP - Datatypes</h1>
    <?php

      function lB($times = 1) {
        for ($i = 0; $i < $times; $i++) {
          echo "<br>";
        }
      }

      // Strings
      echo "<h3>Strings</h3>";
      $stringDouble = "I'm a string";
      $stringSingle = 'I`m a string';

      echo "String: $stringDouble<br>";
      print "String: $stringSingle<br>";
      printf('String: %s<br>', $stringSingle); // '\n' does not work correctly on PHP -> browser display/html mix up.. idk
      var_dump($stringDouble); lB();
      lB();
      echo "String: '", $stringDouble, "' (length: ", strlen($stringDouble), ")<br>";
      echo "String: '", $stringDouble, "' (word count: ", str_word_count($stringDouble), ")<br>";
      // so ... 'string length' -> strlen
      //        'string word count' -> str_word_count
      //        -> :O
      echo "String: '", $stringDouble, "' (string reverse: ", strrev($stringDouble), ")<br>";
      echo "String: '", $stringDouble, "' (string position 'string': ", strpos($stringDouble, "string"), ")<br>";
      echo "String: '", $stringDouble, "' (string replace 'string' -> 'text': ", str_replace("string", "text", $stringDouble), ")<br>";
      lB(2);

      // Integers
      echo "<h3>Integers</h3>";
      $int = 12345;
      var_dump($int); lB();
      printf("std int: %d<br>", $int);
      printf("science int: %e<br>", $int);
      printf("floating int: %f<br>", $int);
      printf("octal int: %o<br>", $int);
      printf("string int: %s<br>", $int);
      printf("hexa lower int: %x<br>", $int);
      printf("hexa upper int: %X<br>", $int);
      printf("expl signed int: %+d<br>", $int);
      $negInt = -12345;
      printf("std int: %d<br>", $negInt);
      printf("expl signed int: %+d<br>", $negInt);
      lB();
      echo "INT Max: ", PHP_INT_MAX, "<br>";
      echo "INT Min: ", PHP_INT_MIN, "<br>";
      echo "INT Size: ", PHP_INT_SIZE, "<br>";
      echo "Is '123.2' an integer? '", is_int(123.2), "' ...Why is nothing displayed?!<br>";
      echo "Is 'asd' an integer? '", is_int(asd), "' ...Why is nothing displayed?!<br>";
      echo "Is '", $int, "' an integer? '", var_dump(is_int($int)), "'<br>";
      echo "Is '123.2' an integer? '", var_dump(is_int(123.2)), "'<br>";
      lB(2);

      // Floats
      echo "<h3>Floats</h3>";
      $float = 123.45;
      var_dump($float); lB();
      printf("std float: %f<br>", $float);
      echo "FLOAT Max: ", PHP_FLOAT_MAX, "<br>";
      echo "FLOAT Constant not implemented in this PHP version (from PHP 7.2)<br>";
      lB(2);

      // Misc
      echo "<h3>Misc</h3>";
      $x = 123;
      echo "Is finite '", $x, "': ", is_finite($x), "<br>";
      echo "Is infinite '", $x, "': ", is_infinite($x), "<br>";
      echo "That we don't get any output seems ridiculous<br>";
      echo "Is finite '", $x, "': ", var_dump(is_finite($x)), "<br>";
      echo "Is infinite '", $x, "': ", var_dump(is_infinite($x)), "<br>";
      $y = 1.9e411;
      echo "Is finite '", $y, "': ", is_finite($y), "<br>";
      echo "Is infinite '", $y, "': ", is_infinite($y), "<br>";
      echo "Is finite '", $y, "': ", var_dump(is_finite($y)), "<br>";
      echo "Is infinite '", $y, "': ", var_dump(is_infinite($y)), "<br>";

      echo "NaN used for impossible mathematical operations<br>";
      $z = "asd";
      echo "Is Not A Number (NaN) '", $x, "': ", is_nan($x), "<br>";
      echo "Is Not A Number (NaN) '", $y, "': ", is_nan($y), "<br>";
      echo "Is Not A Number (NaN) '", $z, "': ", is_nan($z), "<br>";
      echo "Is Not A Number (NaN) '", acos(8), "': ", is_nan(acos(8)), "<br>";
      lB(2);

      // Numerical Strings & Casting
      echo "<h3>Numerical Strings & Casting</h3>";
      echo "Is numeric '", 123, "': ", var_dump(is_numeric(123)), "<br>";
      echo "Is numeric '", 123.45, "': ", var_dump(is_numeric(123.45)), "<br>";
      echo "Is numeric '", "asd", "': ", var_dump(is_numeric("asd")), "<br>";
      echo "Is numeric '", "1asd", "': ", var_dump(is_numeric("1asd")), "<br>";

      echo "Cast '", 123.45, "' to integer '", (int)123.45, "<br>";
      echo "Cast '123' (string) to integer '", (int)"123", "<br>";
      lB(2);

      // Math functions
      echo "<h3>Math functions</h3>";
      echo "Pi: ", pi(); lB();
      echo "Min of 1, 2, 3: ", min(1, 2, 3); lB();
      echo "Max of 4, 5, 6: ", max(4, 5, 6); lB();
      echo "Abs of -6.2: ", abs(-6.2); lB();
      echo "Sqrt of 36: ", sqrt(36); lB();
      echo "Round of 0.5: ", round(0.5); lB();
      echo "Round of 0.49: ", round(0.49); lB();
      echo "Random number: ", rand(); lB();
      echo "Random number between 1 and 10: ", rand(1, 10); lB();
      echo "Random number between 0.0 and 1.0: ", rand(0.0, 1.0); lB();


      // Booleans
      echo "<h3>Booleans</h3>";
      $true = true;
      $false = false;
      var_dump($true); lB();
      var_dump($false); lB();
      lB(2);

      // Arrays
      echo "<h3>Arrays</h3>";
      $arr = array("1st", "2nd", "3rd", 4); // I can store different types into an array :O
      var_dump($arr);
      lB(2);

      // Objects
      echo "<h3>Objects</h3>";
      class Example {
        public $number;
        public $string;
        public function __construct($number, $string) {
          $this->number = $number;
          $this->string = $string;
        }

        public function msg() {
          return "My example class has this number '" . $this->number . "' and this string '" . $this->string . "'!";
        }
      }

      $myClass = new Example(123, "hello class!");
      echo $myClass -> msg();
      lB(2);

      // NULL values
      echo "<h3>NULL values</h3>";
      $null = null;
      var_dump($null); lB();
      lB(2);

    ?>

  </body>
</html>
