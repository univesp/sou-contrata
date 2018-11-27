<?php

namespace NoLock;

use Illuminate\Filesystem\FileSystem;

class FilesystemWithNoLock extends FileSystem
{
    public function put($path, $contents, $lock = false)
    {
        return file_put_contents($path, $contents, false);
    }
}
