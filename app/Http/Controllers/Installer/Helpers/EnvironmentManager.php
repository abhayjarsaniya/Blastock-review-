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
 namespace App\Http\Controllers\Installer\Helpers; use Exception; use Illuminate\Http\Request; class EnvironmentManager { private $envPath; private $envExamplePath; public function __construct() { $this->envPath = base_path("\56\x65\x6e\166"); $this->envExamplePath = base_path("\x2e\x65\156\166\x2e\x65\x78\141\155\x70\x6c\x65"); } public function getEnvContent() { if (file_exists($this->envPath)) { goto RSA07; } if (file_exists($this->envExamplePath)) { goto uRQ6_; } touch($this->envPath); goto qyl4e; uRQ6_: copy($this->envExamplePath, $this->envPath); qyl4e: RSA07: return file_get_contents($this->envPath); } public function getEnvPath() { return $this->envPath; } public function getEnvExamplePath() { return $this->envExamplePath; } public function saveFileClassic(Request $input) { $message = trans("\151\156\x73\x74\x61\x6c\x6c\x65\x72\x5f\155\x65\163\163\x61\x67\x65\x73\56\x65\156\166\151\162\x6f\x6e\x6d\145\156\x74\x2e\x73\x75\x63\143\x65\x73\x73"); try { file_put_contents($this->envPath, $input->get("\x65\x6e\166\103\157\156\x66\151\x67")); } catch (Exception $e) { $message = trans("\x69\x6e\163\x74\x61\x6c\x6c\145\x72\137\155\145\x73\163\x61\147\x65\163\x2e\x65\156\166\x69\x72\157\x6e\155\145\156\x74\x2e\145\x72\x72\157\162\163"); } return $message; } }
