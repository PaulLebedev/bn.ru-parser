<?php

class Advert
{
    protected $rooms;
    protected $district_name;
    protected $address;
    protected $floor;
    protected $building_type;
    protected $total_space;
    protected $housing_space;
    protected $kitchen_space;
    protected $sanitary_unit_type;
    protected $price;
    protected $additional_settings;
    protected $subject;
    protected $contact;
    protected $additional_info;

    public function getRooms()
    {
        return $this->rooms;
    }

    public function setRooms($val)
    {
        $this->rooms = $val;
    }

    public function gerDistrictName()
    {
        return $this->district_name;
    }

    public function setDistrictName($val)
    {
        $this->district_name = $val;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($val)
    {
        $this->address = $val;
    }

    public function getFloor()
    {
        return $this->floor;
    }

    public function setFloor($val)
    {
        $this->floor = $val;
    }

    public function getBuildingType()
    {
        return $this->building_type;
    }

    public function setBuildingType($val)
    {
        $this->building_type = $val;
    }

    public function getTotalSpace()
    {
        return $this->total_space;
    }

    public function setTotalSpace($val)
    {
        $this->total_space = $val;
    }

    public function getHousingSpace()
    {
        return $this->housing_space;
    }

    public function setHousingSpace($val)
    {
        $this->housing_space = $val;
    }

    public function getKitchenSpace()
    {
        return $this->kitchen_space;
    }

    public function setKitchenSpace($val)
    {
        $this->kitchen_space = $val;
    }

    public function getSanitaryUnitType()
    {
        return $this->sanitary_unit_type;
    }

    public function setSanitaryUnitType($val)
    {
        $this->sanitary_unit_type = $val;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($val)
    {
        $this->price = $val;
    }

    public function getAdditionalSettings()
    {
        return $this->additional_settings;
    }

    public function setAdditionalSettings($val)
    {
        $this->additional_settings = $val;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($val)
    {
        $this->subject = $val;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($val)
    {
        $this->contact = $val;
    }

    public function getAdditionalInfo()
    {
        return $this->additional_info;
    }

    public function setAdditionalInfo($val)
    {
        $this->additional_info = $val;
    }
}