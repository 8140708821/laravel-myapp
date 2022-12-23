<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JavaScript form validation - checking non-empty</title>
    <link rel='stylesheet' href='form-style.css' type='text/css' />
</head>

<body onload='document.form1.text1.focus()'>
    <div class="mail">
        <h2>Input Credit Card No.[Starting with 34 or 37, length 15 digits (American Express) and Submit</h2>
        <form name="form1" action="#">
            <ul>
                <li><input type='text' name='text1' /></li>
                <li>&nbsp;</li>
                <li class="submit"><input type="button" name="submit" value="Submit"
                        onclick="cardnumber(document.form1.text1)" /></li>
                <li>&nbsp;</li>
            </ul>
        </form>
    </div>
    <script>
        function cardnumber(inputtxt) {
            var americal = /^(?:3[47][0-9]{13})$/;
            var visa = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
            var master = /^(?:5[1-5][0-9]{14})$/;
            var master2 = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
            var diners = /^(?:3(?:0[0-5]|[68][0-9])[0-9]{11})$/;
            var jcb = /^(?:(?:2131|1800|35\d{3})\d{11})$/;
            if (inputtxt.value.match(americal) || inputtxt.value.match(visa) || inputtxt.value.match(master) || inputtxt
                .value.match(master2) || inputtxt.value.match(diners) || inputtxt.value.match(jcb)) {
                return true;
            } else {
                alert("Not a valid Amercican Express credit card number!");
                return false;
            }
        }
    </script>
</body>

</html>
