<?

require_once '../Services/PathService.php';

class HomeController
{
    public $directoryPath = VIEWS_PATH_PREFIX . 'home/';

    public function index(): void
    {
        require_once($this->directoryPath . 'index.php');
    }

    public function investing(): void
    {
        require_once($this->directoryPath . 'investing.php');
    }

    public function faq(): void
    {
        require_once($this->directoryPath . 'faq.php');
    }

    public function contact(): void
    {
        require_once($this->directoryPath . 'contact.php');
    }

    public function testing()
    {
        require_once($this->directoryPath . 'testing.php');
    }
}