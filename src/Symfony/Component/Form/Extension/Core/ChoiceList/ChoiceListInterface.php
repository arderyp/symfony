<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Extension\Core\ChoiceList;

use Symfony\Component\Form\ChoiceList\ChoiceListInterface as BaseChoiceListInterface;
use Symfony\Component\Form\FormConfigBuilder;

/**
 * Contains choices that can be selected in a form field.
 *
 * Each choice has three different properties:
 *
 *    - Choice: The choice that should be returned to the application by the
 *              choice field. Can be any scalar value or an object, but no
 *              array.
 *    - Label:  A text representing the choice that is displayed to the user.
 *    - Value:  A uniquely identifying value that can contain arbitrary
 *              characters, but no arrays or objects. This value is displayed
 *              in the HTML "value" attribute.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @deprecated since version 2.7, to be removed in 3.0.
 *             Use {@link BaseChoiceListInterface} instead.
 */
interface ChoiceListInterface extends BaseChoiceListInterface
{
    /**
     * Returns the choice views of the preferred choices as nested array with
     * the choice groups as top-level keys.
     *
     * Example:
     *
     * <source>
     * array(
     *     'Group 1' => array(
     *         10 => ChoiceView object,
     *         20 => ChoiceView object,
     *     ),
     *     'Group 2' => array(
     *         30 => ChoiceView object,
     *     ),
     * )
     * </source>
     *
     * @return array A nested array containing the views with the corresponding
     *               choice indices as keys on the lowest levels and the choice
     *               group names in the keys of the higher levels
     */
    public function getPreferredViews();

    /**
     * Returns the choice views of the choices that are not preferred as nested
     * array with the choice groups as top-level keys.
     *
     * Example:
     *
     * <source>
     * array(
     *     'Group 1' => array(
     *         10 => ChoiceView object,
     *         20 => ChoiceView object,
     *     ),
     *     'Group 2' => array(
     *         30 => ChoiceView object,
     *     ),
     * )
     * </source>
     *
     * @return array A nested array containing the views with the corresponding
     *               choice indices as keys on the lowest levels and the choice
     *               group names in the keys of the higher levels
     *
     * @see getPreferredValues()
     */
    public function getRemainingViews();

    /**
     * Returns the indices corresponding to the given choices.
     *
     * The indices must be positive integers or strings accepted by
     * {@link FormConfigBuilder::validateName()}.
     *
     * The index "placeholder" is internally reserved.
     *
     * The indices must be returned with the same keys and in the same order
     * as the corresponding choices in the given array.
     *
     * @param array $choices An array of choices. Not existing choices in this
     *                       array are ignored
     *
     * @return array An array of indices with ascending, 0-based numeric keys
     *
     * @deprecated since version 2.4, to be removed in 3.0.
     */
    public function getIndicesForChoices(array $choices);

    /**
     * Returns the indices corresponding to the given values.
     *
     * The indices must be positive integers or strings accepted by
     * {@link FormConfigBuilder::validateName()}.
     *
     * The index "placeholder" is internally reserved.
     *
     * The indices must be returned with the same keys and in the same order
     * as the corresponding values in the given array.
     *
     * @param array $values An array of choice values. Not existing values in
     *                      this array are ignored
     *
     * @return array An array of indices with ascending, 0-based numeric keys
     *
     * @deprecated since version 2.4, to be removed in 3.0.
     */
    public function getIndicesForValues(array $values);
}
