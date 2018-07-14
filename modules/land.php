<?php
    class Land{

        private $__owner;
        private $__acreage;
        private $__houseType;
        private $__purposeUse;
        private $__price;
        private $__address;

        public function __construct($owner,$acreage,$house_type,$purpose_use,$price,$address)
        {
            $this->__owner = $owner;
            $this->__acreage = $acreage;
            $this->__houseType = $house_type;
            $this->__purposeUse = $purpose_use;
            $this->__price = $price;
            $this->__address = $address;
        }


        public function setOwner($value)
        {
            $this->__owner = $value;
        }
        public function getOwner()
        {
            return $this->__owner;
        }

        public function setAcreage($value)
        {
            $this->__acreage = $value;
        }
        public function getAcreage()
        {
            return $this->__acreage;
        }

        public function setHouseType($value)
        {
            $this->__houseType = $value;
        }
        public function getHouseType()
        {
            return $this->__houseType;
        }

        public function setPurposeUse($value)
        {
            $this->__purposeUse = $value;
        }
        public function getPurposeUse()
        {
            return $this->__purposeUse;
        }

        public function setPrice($value)
        {
            $this->__price = $value;
        }
        public function getPrice()
        {
            return $this->__price;
        }

        public function setAddress($value)
        {
            $this->__address = $value;
        }
        public function getAddress()
        {
            return $this->__address;
        }

    }
?>