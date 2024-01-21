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
 namespace App\Http\Controllers\Installer\Helpers; use Exception; use Illuminate\Support\Facades\Artisan; use Symfony\Component\Console\Output\BufferedOutput; class FinalInstallManager { public function runFinal() { $outputLog = new BufferedOutput(); $this->generateKey($outputLog); $this->publishVendorAssets($outputLog); return $outputLog->fetch(); } private static function generateKey($outputLog) { try { if (!config("\151\156\163\164\x61\154\154\145\162\x2e\146\151\156\x61\x6c\x2e\x6b\x65\171")) { goto igfm5; } Artisan::call("\x6b\x65\x79\x3a\x67\x65\156\145\x72\x61\164\x65", ["\x2d\55\146\x6f\162\x63\x65" => true], $outputLog); igfm5: } catch (Exception $e) { return static::response($e->getMessage(), $outputLog); } return $outputLog; } private static function publishVendorAssets($outputLog) { try { if (!config("\x69\x6e\163\164\x61\x6c\154\145\x72\x2e\x66\151\156\x61\x6c\x2e\x70\x75\142\x6c\151\163\x68")) { goto RRqA3; } Artisan::call("\166\x65\156\x64\x6f\x72\x3a\x70\165\x62\154\x69\163\150", ["\55\55\x61\x6c\154" => true], $outputLog); RRqA3: } catch (Exception $e) { return static::response($e->getMessage(), $outputLog); } return $outputLog; } private static function response($message, $outputLog) { return ["\x73\164\141\x74\165\163" => "\145\x72\x72\x6f\x72", "\x6d\145\163\x73\141\147\145" => $message, "\144\x62\x4f\x75\164\x70\165\x74\114\x6f\x67" => $outputLog->fetch()]; } }
