<?

class Helper
{
    public static function endsWith($string, $suffix)
    {
        $strLen = strlen($string);
        $suffixLen = strlen($suffix);

        if ($suffixLen > $strLen) {
            return false;
        }

        return substr_compare($string, $suffix, $strLen - $suffixLen, $suffixLen) === 0;
    }
}