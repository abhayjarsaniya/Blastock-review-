<?php
/*   __________________________________________________
    |  Obfuscated by YAK Pro - Php Obfuscator  2.0.14  |
    |              on 2023-12-23 13:50:09              |
    |    GitHub: https://github.com/pk-fr/yakpro-po    |
    |__________________________________________________|
*/
/*
* Copyright (C) Incevio Systems, Inc - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Munna Khan <help.zcart@gmail.com>, September 2018
*/
 namespace App\Http\Controllers\Installer\Helpers; class PermissionsChecker { protected $results = []; public function __construct() { $this->results["\x70\145\x72\x6d\x69\x73\163\151\x6f\156\x73"] = []; $this->results["\145\x72\x72\157\x72\x73"] = null; } public function check(array $folders) { foreach ($folders as $folder => $permission) { if (!($this->getPermission($folder) >= $permission)) { goto PZtgT; } $this->addFile($folder, $permission, true); goto UoKDJ; PZtgT: $this->addFileAndSetErrors($folder, $permission, false); UoKDJ: Yij6U: } lt87b: return $this->results; } private function getPermission($folder) { return substr(sprintf("\45\x6f", fileperms(base_path($folder))), -4); } private function addFile($folder, $permission, $isSet) { array_push($this->results["\x70\x65\162\155\151\163\163\151\x6f\156\x73"], ["\146\x6f\x6c\x64\x65\x72" => $folder, "\x70\145\162\x6d\x69\x73\x73\x69\x6f\x6e" => $permission, "\151\x73\123\145\164" => $isSet]); } private function addFileAndSetErrors($folder, $permission, $isSet) { $this->addFile($folder, $permission, $isSet); $this->results["\145\x72\x72\157\162\x73"] = true; } }
