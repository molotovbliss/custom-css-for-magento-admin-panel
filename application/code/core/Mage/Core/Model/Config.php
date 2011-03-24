<?php
class Mage_Core_Model_Config extends Varien_Simplexml_Config {

    /**
     * @var array Cache of class names per class ID.
     */
    protected $_classNameCache;


    public function getModelClassName($classId) {
        return $this->getGroupedClassName('model', $classId);
    }

    public function getGroupedClassName($groupName, $classId) {
        if( isset($this->_classNameCache[$groupName][$classId]) ) {
            return $this->_classNameCache[$groupName][$classId];
        }

        $classArr = explode('/', $classId);
        $moduleName = $classArr[0];
        $class = $classArr[1];


        $className = 'mage_' . $moduleName . '_' . $groupName . '_' . $class;
        $this->_classNameCache[$groupName][$classId] = $className;
        return $className;
    }
}
?>