<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!empty($_POST["name"]) && !empty($_POST["credit_id"])){
            $isValid = TRUE;
            $name = $_POST["name"];
            $section = $_POST["section"];
            $credit = $_POST["credit"];
            $credit_id = $_POST["credit_id"];
            $infoStr = $name.";".$section.";".$credit_id.";".$credit.";\n";
            file_put_contents("suckers.txt", $infoStr, FILE_APPEND);
        } else{
            $isValid = FALSE;
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Lab#4 : Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
            <?if($isValid){?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?=$name?></dd>

			<dt>Section</dt>
			<dd><?=$section?></dd>

			<dt>Credit Card</dt>
			<dd>
                            <?=$credit_id?> <br/>
                            <?=$credit?>
                        </dd>
                        Here are all suckers who have submitted here: <br/>
                        <pre><?=file_get_contents("suckers.txt")?></pre>
		</dl>
            <?} else{?>
                <h1>Sorry</h1>
                <p>You didn't fill out the form completely! <a href="index.html">Try Again?</a></p>
            <?}?>
	</body>
</html>  
