<?php
 /**................................................................
 * @package eblog v 1.0
 * @author Faith Awolu 
 * Hillsofts Technology Ltd.            
 * (hillsofts@gmail.com)
 * ................................................................
 */                 
session_start();
include('../connect.php');
$a = $_POST['site_name'];
$b = $_POST['site_title'];
$c = $_POST['email'];
$d = $_POST['site_desc'];
$e = $_POST['site_keyword'];
$f = $_POST['google_code'];
$g = $_POST['street'];
$h = $_POST['city'];
$i = $_POST['country'];
$j = $_POST['phone'];
$k = $_POST['facebook'];
$l = $_POST['twitter'];
$m = $_POST['linkedin'];
$n = $_POST['status'];
$home_ad_enabled = isset($_POST['home_ad_enabled']) ? 1 : 0;
$home_ad_title = $_POST['home_ad_title'] ?? '';
$home_ad_body = $_POST['home_ad_body'] ?? '';
$home_ad_button_text = $_POST['home_ad_button_text'] ?? '';
$home_ad_button_url = $_POST['home_ad_button_url'] ?? '';
$posted_home_ad_image = trim((string) ($_POST['home_ad_image'] ?? ''));
$home_ad_image = $posted_home_ad_image;
$remove_home_ad_image = isset($_POST['home_ad_image_remove']) ? 1 : 0;

$current_home_ad_image = '';
$current_stmt = $db->prepare("SELECT home_ad_image FROM settings WHERE id = 1");
$current_stmt->execute();
$current_row = $current_stmt->fetch(PDO::FETCH_ASSOC);
if ($current_row && isset($current_row['home_ad_image'])) {
  $current_home_ad_image = (string) $current_row['home_ad_image'];
}

$uploaded_home_ad_image = '';
if (isset($_FILES['home_ad_image_file']) && $_FILES['home_ad_image_file']['error'] === UPLOAD_ERR_OK) {
  $upload_dir = __DIR__ . '/../uploads/ads';
  if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
  }

  $original_name = basename((string) $_FILES['home_ad_image_file']['name']);
  $extension = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
  $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
  if (in_array($extension, $allowed_extensions, true)) {
    $safe_name = preg_replace('/[^a-zA-Z0-9._-]/', '_', $original_name);
    $target_name = uniqid('home_ad_', true) . '_' . $safe_name;
    $target_path = $upload_dir . '/' . $target_name;
    if (move_uploaded_file($_FILES['home_ad_image_file']['tmp_name'], $target_path)) {
      $uploaded_home_ad_image = 'uploads/ads/' . $target_name;
    }
  }
}

if ($remove_home_ad_image === 1) {
  $home_ad_image = '';
} elseif ($uploaded_home_ad_image !== '') {
  $home_ad_image = $uploaded_home_ad_image;
} elseif ($posted_home_ad_image === '') {
  $home_ad_image = $current_home_ad_image;
}
// query
$sql = "UPDATE settings SET 
        `site_name`=?,`site_title`=?,`email`=?,`site_desc`=?,`site_keyword`=?,`google_code`=?,
        `street`=?,`city`=?,`country`=?,`phone`=?,`facebook`=?,
        `twitter`=?,`linkedin`=?,`status`=?,
        `home_ad_enabled`=?,`home_ad_title`=?,`home_ad_body`=?,`home_ad_button_text`=?,`home_ad_button_url`=?,`home_ad_image`=? WHERE id= 1";
//$sql = "INSERT INTO settings (site_name,site_title,email,site_keyword,street,city,country,phone,facebook,twitter,linkedin,status) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l)";
function nhfc_redirect($url) {
  if (headers_sent()) {
    echo "Redirect failed. " . htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    exit;
  }
  header($url);
  exit;
}

try {
  $stmt = $db->prepare($sql);
  $ok = $stmt->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$home_ad_enabled,$home_ad_title,$home_ad_body,$home_ad_button_text,$home_ad_button_url,$home_ad_image));
  if ($ok) {
    nhfc_redirect("location:settings.php?success=true");
  } else {
    nhfc_redirect("location:settings.php?failed=true");
  }
} catch (PDOException $ex) {
  nhfc_redirect("location:settings.php?failed=true&error=" . urlencode($ex->getMessage()));
}

?>
