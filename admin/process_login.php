<?php
/**................................................................
 * @package eblog v 1.0
 * @author Faith Awolu
 * Hillsofts Technology Ltd.
 * (hillsofts@gmail.com)
 * ................................................................
 */

include '../connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: sign-in.php");
    exit();
}

$login = trim($_POST['username'] ?? '');
$password = (string) ($_POST['password'] ?? '');

if ($login === '' || $password === '') {
    echo '<script language="javascript">';
    echo "alert('Username and password are required.');window.location.href='sign-in.php'";
    echo '</script>';
    exit();
}

$stmt = $db->prepare("SELECT id, name, email, file, password FROM table_admin WHERE username = :username LIMIT 1");
$stmt->execute(array(':username' => $login));
$member = $stmt->fetch(PDO::FETCH_ASSOC);

$authenticated = false;
if ($member) {
    $stored_password = (string) $member['password'];

    // Backward compatibility: support both legacy plain-text and password_hash values.
    if (password_verify($password, $stored_password) || hash_equals($stored_password, $password)) {
        $authenticated = true;
    }
}

if ($authenticated) {
    session_regenerate_id(true);
    $_SESSION['SESS_MEMBER_ID'] = $member['id'];
    $_SESSION['SESS_FIRST_NAME'] = $member['name'];
    $_SESSION['SESS_LAST_NAME'] = $member['email'];
    $_SESSION['SESS_PRO_PIC'] = $member['file'];

    // Upgrade legacy plain-text passwords to secure hashes on successful login.
    $password_info = password_get_info($member['password']);
    if ($password_info['algo'] === 0) {
        $new_hash = password_hash($password, PASSWORD_DEFAULT);
        $update = $db->prepare("UPDATE table_admin SET password = :password WHERE id = :id");
        $update->execute(array(':password' => $new_hash, ':id' => $member['id']));
    }

    session_write_close();
    header("location: index.php");
    exit();
}

echo '<script language="javascript">';
echo "alert('Something went wrong, enter correct details.');window.location.href='sign-in.php'";
echo '</script>';
exit();
?>




