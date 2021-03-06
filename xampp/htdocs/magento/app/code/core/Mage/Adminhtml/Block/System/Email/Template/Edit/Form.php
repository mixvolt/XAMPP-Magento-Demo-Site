<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml system template edit form
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Mage_Adminhtml_Block_System_Email_Template_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('base_fieldset',
            array('legend'=>Mage::helper('adminhtml')->__('Template Information'),'class'=>'fieldset-wide')
        );

        $fieldset->addField('template_code', 'text', array(
            'name'=>'template_code',
            'label' => Mage::helper('adminhtml')->__('Template Name'),
            'required' => true

        ));

        $fieldset->addField('template_subject', 'text', array(
            'name'=>'template_subject',
            'label' => Mage::helper('adminhtml')->__('Template Subject'),
            'required' => true
        ));

        $fieldset->addField('template_text', 'editor', array(
            'name'=>'template_text',
            'wysiwyg' => !Mage::registry('email_template')->isPlain(),
            'label' => Mage::helper('adminhtml')->__('Template Content'),
            'required' => true,
            'theme' => 'advanced',
            'state' => 'html',
           	'style' => 'height:24em;',
        ));

        if (Mage::registry('email_template')->getId()) {
            $form->addValues(Mage::registry('email_template')->getData());
        }

        if ($values = Mage::getSingleton('adminhtml/session')->getData('email_template_form_data', true)) {
        	$form->setValues($values);
        }

        $this->setForm($form);

        return parent::_prepareForm();
    }
}
