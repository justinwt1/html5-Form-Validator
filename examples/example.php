<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Form Validator Test</title>
     <link rel="stylesheet" href="../css/form-validator.css">
     <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
     <script src="../js/form-validator.js"></script>
</head>
<script>
$(document).ready(function()
    {
    init_onSubmit("testForm", "testFormSubmit");
    init_fixError("testForm");
    //init_active();
    });

function myCustomFunction()
    {
    var text = $("input[name=custom_field]").val();
    var title = '';
    var ret = true;
    if(text.length < 4)
        {
        title = 'This field needs to be longer than 4 characters!';
        ret = false;
        }
    else if(text.length > 7)
        {
        title = 'Slow down, this field should be also be less than 7 characters!';
        ret = false;
        }
    else if(text != $("input[name=pass1]").val())
        {
        title = 'Also, this field needs to be the same as the previous password field. Sorry!';
        ret = false;
        }
    $("input[name=custom_field]").prop('title', title);
    $("input[name=custom_field]")[0].setCustomValidity(title); //note: this just needs to not be an empty string in order to mark the field as invalid
    return ret;
    }
</script>
<body>
<form id="testForm" name="testForm">
    <p>
        Text Field: <input required type="text" name="text1" title="fill this out">
    </p>
    <p>
        Password Field: <input required type="password" name="pass1">
    </p>
    <p>
        Custom Field: <input type="text" maxlength="11" class="form-control" name="custom_field">
    </p>
    <p>
        Select: <select required name="selectBox" title="fill this out">
            <option value=""></option>
            <option value="one">one</option>
            <option value="two">two</option>
            <option value="three">three</option>
        </select>
    </p>

    <p>
        <textarea required></textarea>
    <p>
        Radio Field(s): <input required type="radio" name="rad1" value="1">  <input required type="radio" name="rad1" value="2">  <input required type="radio" name="rad1" value="3">
    </p>
    <p>
        Checkbox Field: <input required type="checkbox" name="check1" value="1">
    </p>
    <p><input required type="submit" value="Submit Form" id="testFormSubmit" onclick="myCustomFunction();"></p>
</form>
</body>
</html>
