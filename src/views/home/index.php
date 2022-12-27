<?

require_once '../Services/PathService.php';

$pageTitle = "Home Page";
$additionalScripts = '
<script src="./resources/js/slider.js"></script>
';

$pageContent = file_get_contents(VIEWS_PATH_PREFIX . "home/index.html");

include_once LAYOUTS_PATH_PREFIX . "main.php";

?>