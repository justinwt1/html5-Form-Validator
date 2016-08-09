# HTML5 Form Validator
html5 form validator for bootstrap and non-bootstrap projects

This is a simple and very lighweight JQuery plug-in for an html5 form validator.
The plugin has separate components for both bootstrap and non-bootstrap projects.

I have found many form validators to be overly complex or difficult to customize so I decided to create my own.
This is a simple and very lighweight JQuery plugin for an html5 form validator. The plug-in has separate components for both bootstrap and non-bootstrap webpages. 
It is very easy to use and offers simple customization features. Works using html5 "pattern" attribute (regex) or custom js functions

## Features
- Utilizes native HTML5 attributes - simply set an input element to "required" and add a regex "pattern" if needed. The "title" attribute is used to display an error message.
- Create custom functions that can be easily tied to input validations that are more complex than a regex
- Easily editble css styles to change the appearance of invalid fields
- Can have validator run in real time as you type into a field, just on form submit, or customized to your hearts content
- Small amount of easy to understand code that can be customized to fit your project

## How to use
- Just include need to include the .js and .css file on your webpage (.bootstrap.js and .bootstrap.css for bootstrap pages)
- See examples folder for bootstrap and non-bootstrap form examples (includes custom function example)
- .js files include comments for how to use each function, but a quick rundown is given below:

#### use one or more of the provided initialization functions
```js
<script>
$(document).ready(function()
    {
	//all fields for given formID will be validated when buttonID is clicked
    init_onSubmit(formID, buttonID);
	
	//fields that currently have errors will have error styles removed once field meets correct criteria
    init_fixError("testForm");
	
	//fields will actively be checked as you type in or leave the field and error styles will be displayed as it does or does not match criteria
    init_active();
    });
</script>
```
For all basic needs, you will likely just need to use these init functions. Most forms, which only display errors after a submit has been attempted will want to use init_onSubmit() and init_fixError() together. If you want your form to always inform the user whether or not a field is correct, use init_active().
#### Manually validate a field or entire form with validateField() and validateForm() functions
```html
<form id="exampleForm">
<input required pattern=".{2,11}" type="text" name="example" title="Must be between 2 and 11 characters long" onblur="validateField(this);">

<input type="submit" value="Submit Form" id="exampleForm_btn" onclick="validateForm('exampleForm');">
</form>
```
#### Create a custom function tied to field validation
```html
<script>
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
    else if(text != $("input[name=pass]").val())
        {
        title = 'Also, this field needs to be the same as the previous password field. Sorry!';
        ret = false;
        }
    $("input[name=custom_field]").prop('title', title);
    $("input[name=custom_field]")[0].setCustomValidity(title); //note: this just needs to not be an empty string in order to mark the field as invalid
    return ret;
    }
</script>
<form id="exampleForm">
<input required type="password" name="pass">

<input type="text" maxlength="11" class="form-control" name="custom_field" onblur="myCustomFunction();">

<input type="submit" value="Submit Form" id="exampleForm_btn" onclick="myCustomFunction();">
</form>
```
