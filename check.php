<!DOCTYPE html>
<html>
<head>
  <title></title>
<link href="/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="/facebox/facebox.js" type="text/javascript"></script>
<script src="jquery.js" type="text/javascript"></script>
</head>

<body>
<a href="http://localhost/aims/user.php" rel="facebox">ad</a>

</body>
 <script type="text/javascript">

jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
})</script>
</html>