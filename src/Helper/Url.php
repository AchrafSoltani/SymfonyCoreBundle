<?php
/**
 * Url Helper
 *
 * include methods that help with url management in a sympfony 2/3 project
 *
 * @package     SymfonyCoreBundle
 * @subpackage  Helper
 * @category    Helper
 * @author      Achraf Soltani <soltani.achraf@gmail.com>
 * @link        http://www.achrafsoltani.com
 * @date        1/25/16
 * @file        Url.php
 */

namespace SymfonyCoreBundle\Helper;


class Url
{
    static public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }
}