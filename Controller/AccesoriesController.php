<?php
require_once("../Model/EquipmentModel.php");

$equipmentsInfo = new EquipmentModel();

$equipments = $equipmentsInfo->GetEquipmentList();

require_once("../View/AddEquipment.php");

