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
 namespace App\Http\Controllers\Installer; use App\Http\Controllers\Installer\Helpers\DatabaseManager; use App\Http\Controllers\Installer\Helpers\EnvironmentManager; use App\Http\Controllers\Installer\Helpers\FinalInstallManager; use App\Http\Controllers\Installer\Helpers\InstalledFileManager; use Illuminate\Routing\Controller; class FinalController extends Controller { public function final(FinalInstallManager $finalInstall, EnvironmentManager $environment) { $finalMessages = $finalInstall->runFinal(); $finalEnvFile = $environment->getEnvContent(); return view("\x69\x6e\x73\164\x61\x6c\x6c\145\x72\56\146\151\x6e\x69\163\x68\145\x64", compact("\x66\151\x6e\141\x6c\x4d\145\163\163\141\x67\145\x73", "\146\x69\x6e\141\x6c\x45\x6e\x76\106\151\x6c\x65")); } public function seedDemo(DatabaseManager $databaseManager) { $response = $databaseManager->seedDemoData(); return redirect()->route("\x49\156\163\x74\x61\x6c\154\x65\x72\x2e\x66\151\x6e\151\x73\150"); } public function finish(InstalledFileManager $fileManager) { $finalStatusMessage = $fileManager->update(); return redirect()->to(config("\151\x6e\163\164\141\x6c\154\x65\x72\56\162\x65\144\151\162\x65\143\164\x55\162\154"))->with("\x6d\145\163\x73\141\x67\145", $finalStatusMessage); } }
