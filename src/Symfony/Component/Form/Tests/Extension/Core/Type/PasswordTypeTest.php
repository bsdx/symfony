<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Extension\Core\Type;

class PasswordTypeTest extends \Symfony\Component\Form\Test\TypeTestCase
{
    public function testEmptyIfNotBound()
    {
        $form = $this->factory->create('password');
        $form->setData('pAs5w0rd');
        $view = $form->createView();

        $this->assertSame('', $view->vars['value']);
    }

    public function testEmptyIfBound()
    {
        $form = $this->factory->create('password');
        $form->bind('pAs5w0rd');
        $view = $form->createView();

        $this->assertSame('', $view->vars['value']);
    }

    public function testNotEmptyIfBoundAndNotAlwaysEmpty()
    {
        $form = $this->factory->create('password', null, array('always_empty' => false));
        $form->bind('pAs5w0rd');
        $view = $form->createView();

        $this->assertSame('pAs5w0rd', $view->vars['value']);
    }

    public function testNotTrimmed()
    {
        $form = $this->factory->create('password', null);
        $form->bind(' pAs5w0rd ');
        $data = $form->getData();

        $this->assertSame(' pAs5w0rd ', $data);
    }
}
