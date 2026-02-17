<?php
include '../connect.php';

// Validate and sanitize form inputs
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING);
$venue = filter_input(INPUT_POST, 'venue', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$detail = filter_input(INPUT_POST, 'detail', FILTER_SANITIZE_STRING);

// This code will save file into the database
$query = ORM::for_table('events')->create();
$query->title = $title;
$query->date = $date;
$query->time = $time;
$query->venue = $venue;
$query->phone = $phone;
$query->detail = $detail;
$query->save();

if ($query) {
    header("Location: add-event.php?success=true");
} else {
    header("Location: add-event.php?failed=true");
}
