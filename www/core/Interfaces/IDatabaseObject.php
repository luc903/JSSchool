<?php

interface IDatabaseObject
{
    public function GetAll();
    public function Where($args);
    public function Add($row);
}
