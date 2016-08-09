//Checks whether or not a given input element is valid or not. Can be called manually
function validateField(inputObject)
	{
	//remove error display if it exists due to possible resize or a state change in validity
	$(inputObject).next("i").remove();
	$(inputObject).next(".with-errors").remove();
	if($(inputObject).is(":invalid"))
		{
		$(inputObject).addClass('has-error');
		var objectType = $(inputObject).prop('type');
		var marginWidth = 13;
		//move error display glyph over so it doesn't cover arrow on select boxes
		if($(inputObject).prop('tagName') == "SELECT")
			marginWidth += 17;
		//checkboxes and radios don't really need native validation
		if(objectType != "checkbox" && objectType != "radio")
			{
			$(inputObject).after('<i style="margin-left:-'+marginWidth+'px; margin-right:'+marginWidth+'px" class="glyphicon glyphicon-remove">x</i><span class="with-errors">'+$(inputObject).prop('title')+'</span>');
			$(inputObject).siblings('.with-errors').html($(inputObject).prop('title'));
			}
		}
	else
		{
		$(inputObject).removeClass('has-error');
		}
	}

//goes through all input, select, textarea elements in given form and runs validateField function of them
	function validateForm(formID)
		{
		$("#"+formID).find("input, select, textarea").each(function()
			{
			validateField(this);
			})
		}

//re-evaluate any error message positioning incase the browser is resized after invalid inputs has been displayed
$(window).resize(function()
	{
	$("form").each(function()
		{
		$(this).find(".has-error").each(function()
			{
			validateField(this);
			});
		});
	});

/* Page validation options
can put these options in $(document).ready(function() depending on how you want the form to return validation errors
you can initialize multiple validation options
You can also manually call validate form
*/

//errors display when clicking a form's submit button
function init_onSubmit(formID, buttonID)
	{
	$("#"+buttonID).click(function() {
		validateForm(formID);
		});
	}

//removes error when field has proper validation
function init_fixError(formID)
	{
	$("#"+formID).on('keyup keypress blur change', '.has-error',function () {
        validateField(this);
        });
	}

//errors will display actively in the working field if the input is not valid for any form
function init_active()
	{
	$("input, select, textarea").on('keyup keypress blur change', function() {
        validateField(this);
        })
	}
