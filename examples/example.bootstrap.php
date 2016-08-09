<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Validator Test</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/form-validator.bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="../js/form-validator.bootstrap.js"></script>
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
        title = 'Slow down, this field should be less than 7 characters!';
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
    <form id="testForm" name="testForm" class="form-horizontal">
        <div class="form-group">
            <label class="control-label required-label col-sm-2">Name:</label>
            <div class="col-sm-3">
                <input required type="text" pattern=".{2,11}" maxlength="11" class="form-control" name="first_name" title="Must be between 2 and 11 characters long">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label required-label col-sm-2">
                Password Field: </label>
            <div class="col-sm-3">
                <input required pattern=".{6,}" class="form-control" type="password" name="pass1" title="password must be at least 6 characters in length">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label required-label col-sm-2">Custom Field:</label>
            <div class="col-sm-3">
                <input type="text" maxlength="11" class="form-control" name="custom_field">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label required-label col-sm-2">
                Select Box: </label>
            <div class="col-sm-3">
                <select required name="selectBox" class="form-control" title="please select a dropdown option">
                    <option value=""></option>
                    <option value="one">one</option>
                    <option value="two">two</option>
                    <option value="three">three</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label required-label col-sm-2">
                Textarea</label>
            <div class="col-sm-3">
                <textarea required class="form-control" title="just type anything"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label required-label col-sm-2">
                Radio Field(s): </label>
            <div class="col-sm-3">
                <input required type="radio" name="rad1" id="rad1_1" value="1">
                <input required type="radio" name="rad1" id="rad1_2" value="2">
                <input required type="radio" name="rad1" id="rad1_3" value="3">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label required-label col-sm-2">
                Checkbox Field: </label>
            <div class="col-sm-3">
                <input required class="form-control" type="checkbox" name="check1" value="1">
            </div>
        </div>
        <div class="form-group">
            <div class=" col-sm-2"></div>
            <div class="col-sm-3"><input class="form-control" type="submit" value="Submit Form" id="testFormSubmit" onclick="myCustomFunction();"></div>
        </div>
    </form>
</body>

</html>
