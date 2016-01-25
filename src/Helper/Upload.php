<?php
/**
 * Upload Helper
 *
 * include methods that manage file uploading, saving and deleting in a sympfony 2/3 project
 *
 * @package     SymfonyCoreBundle
 * @subpackage  Helper
 * @category    Helper
 * @author      Achraf Soltani <soltani.achraf@gmail.com>
 * @link        http://www.achrafsoltani.com
 * @date        1/25/16
 * @file        Upload.php
 */

namespace SymfonyCoreBundle\Helper;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Upload
{
    public static function validateExtension(UploadedFile $file, Array $extensions)
    {
        $ext = substr(strrchr($file->getClientOriginalName(),'.'),1);
        return in_array($ext, $extensions);
    }

    public static function save($path, UploadedFile $file)
    {
        $ext = substr(strrchr($file->getClientOriginalName(),'.'),1);
        $new_name = md5(time().rand()).'.'.$ext;
        $file->move($path, $new_name);
        return $new_name;
    }

    public static function delete($path, $file)
    {
        if(file_exists($path.'/'.$file))
            unlink($path.'/'.$file);
    }
}