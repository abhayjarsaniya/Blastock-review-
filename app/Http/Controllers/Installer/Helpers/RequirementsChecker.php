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
 namespace App\Http\Controllers\Installer\Helpers; class RequirementsChecker { private $_minPhpVersion = "\67\56\x32\56\x30"; public function check(array $requirements) { $results = []; foreach ($requirements as $type => $requirement) { switch ($type) { case "\x70\x68\x70": foreach ($requirements[$type] as $requirement) { $results["\162\x65\161\165\x69\162\145\x6d\145\x6e\x74\x73"][$type][$requirement] = true; if (extension_loaded($requirement)) { goto P1Cu5; } $results["\x72\x65\x71\165\x69\x72\x65\x6d\145\x6e\x74\163"][$type][$requirement] = false; $results["\x65\x72\162\x6f\x72\x73"] = true; P1Cu5: yIDp5: } u1HMf: goto IGHna; case "\x61\x70\x61\x63\150\145": foreach ($requirements[$type] as $requirement) { if (!function_exists("\141\x70\x61\x63\150\145\137\147\145\x74\x5f\x6d\157\144\x75\154\145\x73")) { goto TaHCL; } $results["\x72\145\161\165\x69\x72\145\155\x65\156\x74\163"][$type][$requirement] = true; if (in_array($requirement, apache_get_modules())) { goto ftMm6; } $results["\x72\145\161\165\x69\x72\145\x6d\x65\156\164\163"][$type][$requirement] = false; $results["\x65\162\162\157\162\163"] = true; ftMm6: TaHCL: m7YG0: } Eyr0A: goto IGHna; } tm59G: IGHna: vXPOM: } BLOjt: return $results; } public function checkPHPversion(string $minPhpVersion = null, string $maxPhpVersion = null) { $currentPhpVersion = $this->getPhpVersionInfo(); $supported = false; if (!($minPhpVersion == null)) { goto PZmUf; } $minPhpVersion = $this->getMinPhpVersion(); PZmUf: if ($maxPhpVersion == null && version_compare($currentPhpVersion["\166\145\x72\x73\x69\x6f\x6e"], $minPhpVersion, "\76\75")) { goto JrmkH; } if (version_compare($currentPhpVersion["\166\x65\x72\x73\x69\157\x6e"], $minPhpVersion, "\76\75") && version_compare($currentPhpVersion["\166\145\x72\x73\151\157\156"], $maxPhpVersion, "\74\75")) { goto QmNXk; } goto tPwZt; JrmkH: $supported = true; goto tPwZt; QmNXk: $supported = true; tPwZt: $phpStatus = ["\x66\x75\x6c\x6c" => $currentPhpVersion["\x66\x75\154\154"], "\x63\165\x72\x72\x65\156\x74" => $currentPhpVersion["\166\145\162\163\x69\x6f\156"], "\155\x69\156\151\x6d\x75\x6d" => $minPhpVersion, "\x6d\x61\170\151\x6d\165\155" => $maxPhpVersion, "\x73\165\x70\160\x6f\162\164\145\144" => $supported]; return $phpStatus; } private static function getPhpVersionInfo() { $currentVersionFull = PHP_VERSION; preg_match("\43\x5e\134\144\x2b\50\134\x2e\x5c\144\53\x29\52\x23", $currentVersionFull, $filtered); $currentVersion = $filtered[0]; return ["\146\165\154\x6c" => $currentVersionFull, "\166\x65\x72\x73\151\x6f\x6e" => $currentVersion]; } protected function getMinPhpVersion() { return $this->_minPhpVersion; } }