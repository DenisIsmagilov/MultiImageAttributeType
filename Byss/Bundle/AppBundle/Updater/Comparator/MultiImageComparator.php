<?php

namespace Byss\Bundle\AppBundle\Updater\Comparator;

use Pim\Component\Catalog\Comparator\ComparatorInterface;

/**
 * Comparator which calculate change set for multi image
 *
 * @author Tomasz Sanecki <t.sanecki@byss.pl>
 * @copyright 2018 Byss
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class MultiImageComparator implements ComparatorInterface
{
    /** @var array */
    protected $types;

    /**
     * @param array $types
     */
    public function __construct(array $types)
    {
        $this->types = $types;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($type)
    {
        return in_array($type, $this->types);
    }

    /**
     * {@inheritdoc}
     */
    public function compare($data, $originals)
    {
        $default = ['locale' => null, 'scope' => null, 'data' => []];
        $originals = array_merge($default, $originals);
        if (null === $data['data']) {
            $data['data'] = [];
        }

        if ($data['data'] === $originals['data']) {
            return null;
        }

        return $data;
    }
}
