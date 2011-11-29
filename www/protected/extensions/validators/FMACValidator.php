<?php
/**
 * FMACValidator class file.
 *
 * @author Stefan Volkmar <volkmar_yii@email.de>
 * @version 1.0
 * @link http://www.yiiframework.com/extension/fmac-validator/
 * @license BSD
 */

/**
 * FMACValidator verifies if the attribute is not a valid MAC address.
 *
 */
final class FMACValidator extends CRegularExpressionValidator
{
	/**
	 * @var string the allowed input format
	 */
    protected $_format='all';

    protected function setFormat($format)
    {
        $this->_format=strtolower($format);
        if (!in_array($this->_format, array('all', 'windows', 'unix', 'cisco')))
            throw new CException(Yii::t(__CLASS__,'Invalid MAC Format: {value}.', array('{value}'=>$this->_format)));

    }

    protected function getFormat()
    {
        return $this->_format;
    }

    protected function detectPattern()
    {
        switch ($this->_format) {
            case 'all':// for all 3 standard (IEEE 802) formats
                $this->pattern='/^([0-9a-f]{2}([:-]|$)){6}$|([0-9a-f]{4}([.]|$)){3}$/i';
                break;
            case 'windows':// Windows format mac address (example: 00-25-9c-4b-1e-2b)
                $this->pattern='/^([a-f0-9]{2}-){5}[a-f0-9]{2}$/i';
                break;
            case 'unix':// Unix format mac address (example: 00:15:17:1D:73:5F)
                $this->pattern='/^([a-f0-9]{2}:){5}[a-f0-9]{2}$/i';
                break;
            case 'cisco':// CISCO format mac address (example: 0018.f352.d31c)
                $this->pattern='/^[a-f0-9]{4}\.[a-f0-9]{4}\.[a-f0-9]{4}$/i';
                break;
        }
    }

	protected function validateAttribute($object,$attribute)
    {
        if (is_null($this->message))
            Yii::t(__CLASS__,'The given value of {attribute} was not a valid MAC address.');

        $this->detectPattern();
        parent::validateAttribute($object,$attribute);
	}

	/**
	 * Returns the JavaScript needed for performing client-side validation.
	 * @param CModel $object the data object being validated
	 * @param string $attribute the name of the attribute to be validated.
	 * @return string the client-side validation script.
	 * @see CActiveForm::enableClientValidation
	 * @since 1.1.7
	 */
	public function clientValidateAttribute($object,$attribute)
	{
        if (is_null($this->message))
            Yii::t(__CLASS__,'The given value of {attribute} was not a valid MAC address.');

        $this->detectPattern();
        return parent::clientValidateAttribute($object,$attribute);
	}
    
}