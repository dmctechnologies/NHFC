<?php
/**................................................................
 * ................................................................
 */

/* Database config
Please edit the database info to yours
*/
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_database = "nhfcTZ";
include "idiorm.php";
/* End config */
ORM::configure("mysql:host=" . $db_host . ";dbname=" . $db_database);
ORM::configure("username", $db_user);
ORM::configure("password", $db_pass);

$db = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($conn, $db_database);

class App {
    public static function message($type, $message, $code = '') {
        $code_html = '';
        if (trim((string) $code) !== '') {
            $code_html = ' <span class="alert-link">' . htmlspecialchars((string) $code, ENT_QUOTES, 'UTF-8') . '</span>.';
        }

        if ($type === 'error') {
            return '<div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                               ' . $message . $code_html . '
                            </div>';
        }

        return '<div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                               ' . $message . $code_html . '
                            </div>';
    }
}

function get($val) {
    return $_GET[$val] ?? null;
}
