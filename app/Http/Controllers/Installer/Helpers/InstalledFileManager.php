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
 namespace App\Http\Controllers\Installer\Helpers; class InstalledFileManager { public function create() { $installedLogFile = storage_path("\151\156\163\x74\141\x6c\x6c\x65\x64"); $dateStamp = date("\131\x2f\x6d\x2f\144\40\150\x3a\151\72\x73\141"); if (!file_exists($installedLogFile)) { goto o4KIk; } $message = trans("\151\156\163\x74\141\x6c\x6c\145\x72\137\155\x65\163\163\141\x67\145\x73\x2e\165\160\x64\x61\x74\x65\x72\x2e\x6c\157\147\x2e\x73\165\143\143\145\163\163\137\155\x65\x73\163\141\x67\145") . $dateStamp; file_put_contents($installedLogFile, $message . PHP_EOL, FILE_APPEND | LOCK_EX); goto oEmSY; o4KIk: $message = trans("\x69\x6e\x73\x74\141\x6c\x6c\x65\162\x5f\x6d\145\163\x73\141\147\x65\x73\56\x69\156\x73\164\x61\x6c\x6c\x65\144\56\163\x75\x63\x63\145\x73\163\x5f\x6c\157\147\137\x6d\x65\163\x73\x61\x67\145") . $dateStamp . "\12"; file_put_contents($installedLogFile, $message); oEmSY: return $message; } public function update() { return $this->create(); } }
