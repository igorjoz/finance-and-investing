<?

require_once '../Services/PathService.php';

$pageTitle = "FAQ";

$pageContent = file_get_contents(VIEWS_PATH_PREFIX . "home/faq.html");

include_once LAYOUTS_PATH_PREFIX . "main.php";

?>