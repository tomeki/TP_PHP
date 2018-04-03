<?php

class Menu {

    private $_item;

    public function __construct() {
        $this->_item = Array();
    }

    public function addItem($aTitle, $aLink, $aClass = null) {
        $this->_item[] = new MenuItem($aTitle, $aLink, $aClass);
    }

    public function buildMenu() {
        foreach ($this->_item as $item) {
            echo '<li class="'. $item->getClass() .'"><a href="' . $item->getLink() . '">' . $item->getTitle() . '</a></li>'."\n";
        }
    }

    public function setActiveLink($aLinkName) {
        foreach ($this->_item as $item) {
            if(strcmp($item->getTitle(), $aLinkName) == 0) {
                $item->setClass('active');
            }
        }
    }

    public function addClassLink($aLinkName, $aClass) {
        foreach ($this->_item as $item) {
            if(strcmp($item->getTitle(), $aLinkName) == 0) {
                $item->addClass($aClass);
            }
        }
    }

}

class MenuItem {

    private $_title;
    private $_link;
    private $_class;

    public function __construct($aTitle, $aLink, $aClass = null) {
        $this->_title = $aTitle;
        $this->_link = $aLink;
        $this->_class = $aClass;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getLink() {
        return $this->_link;
    }

    public function getClass() {
        return $this->_class;
    }

    public function setClass($aClass) {
        $this->_class = $aClass;
    }

    public function addClass($aClass) {
        $this->_class .= ' ' . $aClass;
    }
}

?>
