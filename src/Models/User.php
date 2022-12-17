<?

class User
{
    protected $id;
    protected $email;
    protected $password;
    protected $name;

    public function __construct($id, $email, $password, $name)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }
}