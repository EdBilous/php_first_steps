<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please templates the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Empty interface for Twig 1.x compatibility.
 */
interface Twig_SourceContextLoaderInterface extends Twig_LoaderInterface
{
}

class_alias('Twig_SourceContextLoaderInterface', 'Twig\Loader\SourceContextLoaderInterface', false);
