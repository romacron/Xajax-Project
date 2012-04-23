<?php
require_once("../../xajax_core/xajax.inc.php");

function testForm($formData)
{
	$objResponse = new xajaxResponse();
	$objResponse->alert("formData: " . print_r($formData, true));

	$objResponse->assign("submittedDiv", "innerHTML", "<pre>" . (print_r($formData, true)) . '</pre>');
	return $objResponse;
}

$xajax = new xajax();
//$xajax->configure("debug", true);
$xajax->register(XAJAX_FUNCTION, "testForm");
$xajax->processRequest();
$xajax->configure('javascript URI', '../../');
#$xajax->configure('useUncompressedScripts',true);
$xajax->autoCompressJavaScript(null, true);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Form Submission Test| xajax Tests</title>
	<link href="../assets/main.css" rel="stylesheet" type="text/css">
	<?php $xajax->printJavascript("../../") ?>
</head>
<body>
<div class="head">
	<h2><a href="index.php">xajax Form Tests</a></h2>

	<h1>Form Submission Test</h1>
</div>
<div class="module-left"></div>
<div class="content">
	<div class="width-50 fltlft">
		<form id="testForm1" onsubmit="return false;" action="javascript:void(null);">
			<fieldset>
				<legend>Test Form</legend>
				<div><label for="userInput">User Name</label>
					<input type="text" id="userInput" name="userInput" value="text" /></div>
				<div><label for="passwordInput">Password Input</label>
					<input type="password" id="passwordInput" name="passwordInput" value="2br!2b" /></div>
			</fieldset>
			<fieldset>
				<legend>Textarea</legend>
				<label for="textarea">Textarea</label>
				<textarea cols="30" rows="10" id="textarea" name="textarea">text text</textarea>
			</fieldset>
			<fieldset>
				<legend>Checkboxes</legend>
				<div>
					<input type="checkbox" id="checkboxInput1" name="checkboxInput[]" value="1" checked="checked" />
					<label for="checkboxInput1">Checkbox Input 1</label>
				</div>
				<div>
					<input type="checkbox" id="checkboxInput2" name="checkboxInput[]" value="2" checked="checked" />
					<label for="checkboxInput2">Checkbox Input 2</label>
				</div>
			</fieldset>
			<fieldset>
				<legend>Checkboxes as Array</legend>
				<div>
					<input type="checkbox" id="checkboxMethodTwoInput1" name="checkboxMethodTwoInput[0]" value="1"
						   checked="checked" />
					<label for="checkboxMethodTwoInput1">Checkbox Method 2 Input 1</label>
				</div>
				<div>
					<input type="checkbox" id="checkboxMethodTwoInput2" name="checkboxMethodTwoInput[1]" value="2"
						   checked="checked" />
					<label for="checkboxMethodTwoInput2">Checkbox Method 2 Input 2</label>
				</div>
				<div>
					<input type="checkbox" id="checkboxMethodTwoInput3" name="checkboxMethodTwoInput[3]" value="4"
						   checked="checked" />
					<label for="checkboxMethodTwoInput3">Checkbox Method 2 Input 3</label>
				</div>
			</fieldset>
			<fieldset>
				<legend>Multi Dimensions Array</legend>
				<div>
					<input type="checkbox" id="multi1" name="multi[0]['test']" value="1" checked="checked" />
					<label for="multi1">multi[0]['test']</label>
				</div>
				<div>
					<input type="checkbox" id="multi2" name="multi[1]['test1']" value="2" checked="checked" />
					<label for="multi2">multi[1]['test1']</label>
				</div>
				<div>
					<input type="checkbox" id="multi3" name="multi[1]['test2']" value="4" checked="checked" />
					<label for="multi3">multi[1]['test2']</label>
				</div>
			</fieldset>
			<fieldset>
				<legend>Radio Input</legend>
				<div>
					<input type="radio" id="radioInput1" name="radioInput" value="1" checked="checked" />
					<label for="radioInput1">One</label>
				</div>
				<div>
					<input type="radio" id="radioInput2" name="radioInput" value="2" />
					<label for="radioInput2">Two</label>
				</div>
			</fieldset>
			<fieldset>
				<legend>Select</legend>
				<select id="select" name="select">
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
					<option value="4">Four</option>
				</select>
			</fieldset>
			<fieldset>
				<legend>Multiple Select</legend>
				<select id="multipleSelect" name="multipleSelect[]" multiple="multiple" size=4>
					<option value="1" selected="selected">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
					<option value="4">Four</option>
				</select>
			</fieldset>
			<div style="border:solid 1px red; padding: 20px;"><input type="submit" value="submit through xajax"
																	 onclick="xajax_testForm(xajax.getFormValues('testForm1')); return false;" />
			</div>
		</form>
	</div>
</div>
<div class="width-50 fltlft" id="submittedDiv"></div>
</body>
</html>

