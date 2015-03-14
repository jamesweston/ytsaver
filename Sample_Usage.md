## Sample Usage: ##

### Form: ###
Allows a user to submit the url into form
```
<form method="get" action="ytsaver.inc.php">
<input type="text" name="youtube" style="width: 323px" />
<input type="submit" value="Download Video" />
</form>
```

---

### URL Action: ###
Allows a user to create a url including a download

Code:
```
<?php
if($_GET['youtube']) {
require_once('ytsaver.inc.php');
$download = download_youtube($_GET['youtube']);
header("Location: $download");
} else {}
?>
```

Usage:
```
http://anomisurf.com/ytsaver/?youtube=http://youtube.com/watch?v=EwTZ2xpQwpA
```