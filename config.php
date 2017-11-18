 <?php
$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'commentdb';
$con    = mysqli_connect($server, $dbuser, $dbpass);
if (isset($con)) {
    # code...
    $dbSelect = mysqli_select_db($con, 'dbcomment');
    if (!$dbSelect) {
        echo "Problem in selecting database!";
        die(mysqli_error($con));
    }
} else {
    echo "Problem in database connection!";
    die(mysqli_error());
}
?> 
<!-- CREATE TABLE IF NOT EXISTS `tblcomment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERSON` varchar(50) NOT NULL,
  `COMMENT` text NOT NULL,
  `DATEPOSTED` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; -->