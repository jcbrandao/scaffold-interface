<?php

namespace Amranidev\ScaffoldInterface\Filesystem;

use Amranidev\ScaffoldInterface\Filesystem\FileAlreadyExists;

/**
 * Class FileSystem.
 *
 * @package scaffold-interface/FileSystem
 * @author Amrani Houssian <amranidev@gmail.com>
 */
class FileSystem
{

    /**
     * Make a file.
     *
     * @param $file
     * @param $content
     * @throws FileAlreadyExists
     * @return int
     */
    public function make($file, $content)
    {
        if ($this->exists($file)) {

            throw new FileAlreadyExists;
        }

        return file_put_contents($file, $content);

    }

    /**
     * Determine if file exists.
     *
     * @param $file
     * @return bool
     */
    public function exists($file)
    {
        return file_exists($file);
    }

    /**
     * make directory.
     */
    public function makeDir($path)
    {
        if (is_dir($path)) {
            throw new FileAlreadyExists;
        }
        mkdir($path);
    }

    /**
     * File append.
     */
    public function append($path, $content)
    {
        return file_put_contents($path, $content, FILE_APPEND | LOCK_EX);
    }
}
