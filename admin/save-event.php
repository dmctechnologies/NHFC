<?php
include '../connect.php';

// Validate and sanitize form inputs
$title = trim($_POST['title'] ?? '');
$date = trim($_POST['date'] ?? '');
$time = trim($_POST['time'] ?? '');
$venue = trim($_POST['venue'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$detail = trim($_POST['detail'] ?? '');

if ($title === '' || $date === '' || $time === '' || $venue === '' || $detail === '') {
    header("Location: add-event.php?failed=true");
    exit();
}

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
    exit();
} else {
    header("Location: add-event.php?failed=true");
    exit();
}
