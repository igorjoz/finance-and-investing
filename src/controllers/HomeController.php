<?

require_once '../Services/PathService.php';

class HomeController
{
    public $directoryPath = VIEWS_PATH_PREFIX . 'home/';

    public function index(): int
    {
        return require_once($this->directoryPath . 'index.php');
    }

    public function investing(): int
    {
        return require_once($this->directoryPath . 'investing.php');
    }

    public function faq(): int
    {
        return require_once($this->directoryPath . 'faq.php');
    }

    public function contact(): int
    {
        return require_once($this->directoryPath . 'contact.php');
    }
}