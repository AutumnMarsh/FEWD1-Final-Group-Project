<?php
/* Set e-mail recipient */
$myemail  = "autumnmmarsh@gmail.com";

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['yourname'], "Please enter your first and last name");
$email    = check_input($_POST['email']);
$subject  = check_input($_POST['subject'], "Please add a subject");
$comments = check_input($_POST['comments'], "Please add comments");
$subscribe = check_input($_POST['subscribe']);
$how_find = check_input($_POST['how']);
$where = check_input($_POST['where']);
$rentals = check_input($_POST['rental_list[]']);


/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("Please type a valid e-mail address");
}


/* e-mail message */
$message = "Hello!

Your contact form to Adventure Watersports has been submitted:

Name: $yourname
E-mail: $email
Subject: $subject
Subscribe to our eNewsletter? $subscribe
How did he/she find it? $how_find
Rental equipment? $rentals

Comments:
$comments

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>