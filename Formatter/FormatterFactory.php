<?php

/*
 * This file is part of the Crowdin library.
 *
 * (c) Julien Janvier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jjanvier\Library\Crowdin\Formatter;

use \SplFileInfo;

/**
 * Class FormatterFactory
 *
 * Return a formatter according to a translation extension
 */
class FormatterFactory
{
    public static function getInstance(SplFileInfo $file)
    {
        switch ($file->getExtension()) {
            case 'yml':
            case 'yaml':
                return new YamlFormatter();
            default:
                throw new \Exception(sprintf('File with extension %s is not handled yet.', $file->getExtension()));
        }
    }
}
