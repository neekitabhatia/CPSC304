<?php

if ($c=OCILogon("ora_c5y0b", "a36856169", "dbhost.ugrad.cs.ubc.ca:1522/ug")) {
  echo "Successfully connected to Oracle.\n";
  OCILogoff($c);
} else {
  $err = OCIError();
  echo "Oracle Connect Error 1 " . $err['message'];
}

?>
</html>