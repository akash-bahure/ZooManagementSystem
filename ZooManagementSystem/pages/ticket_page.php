<?php

$ticketTable = new Table('tickets');
if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    $totalPrice = $_POST['regular_num'] * 600 + $_POST['child_num'] * 200 + $_POST['student_num'] * 300;
    if ($totalPrice == 0) {
        header('Location:ticket_page?msg=Booking failed. You must select at least one ticket&type=danger');
    } else {
        $_POST['visitor_id'] = $_SESSION['visitor_id'];
        $ticketTable->insertInDatabase($_POST);
        header('Location:ticket_page?msg=Ticket booked successfully!! Your total price is: ' . $totalPrice .'INR'. '&type=success');
    }
}

$title = "Zoo - Ticket";
$content = loadTemplate('../templates/ticket_page_template.php', []);
