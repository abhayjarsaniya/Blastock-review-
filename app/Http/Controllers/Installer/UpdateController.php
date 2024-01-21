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
 namespace App\Http\Controllers\Installer; use App\Http\Controllers\Installer\Helpers\DatabaseManager; use App\Http\Controllers\Installer\Helpers\InstalledFileManager; use Illuminate\Routing\Controller; class UpdateController extends Controller { use \App\Http\Controllers\Installer\Helpers\MigrationsHelper; public function welcome() { return view("\151\156\x73\164\141\154\x6c\145\x72\x2e\x75\x70\x64\141\164\145\x2e\167\145\154\143\157\155\145"); } public function overview() { $migrations = $this->getMigrations(); $dbMigrations = $this->getExecutedMigrations(); return view("\151\156\163\x74\x61\x6c\154\145\162\56\x75\160\x64\141\164\x65\56\x6f\x76\145\162\166\151\x65\x77", ["\156\165\155\x62\x65\x72\x4f\x66\x55\160\x64\x61\x74\145\x73\x50\x65\x6e\x64\151\x6e\x67" => count($migrations) - count($dbMigrations)]); } public function database() { $databaseManager = new DatabaseManager(); $response = $databaseManager->migrateAndSeed(); return redirect()->route("\x4c\141\x72\141\166\x65\154\125\x70\144\x61\x74\145\162\x3a\x3a\146\151\156\141\154")->with(["\x6d\145\163\163\x61\x67\145" => $response]); } public function finish(InstalledFileManager $fileManager) { $fileManager->update(); return view("\x69\x6e\x73\164\x61\154\154\145\162\x2e\165\160\x64\x61\x74\x65\56\x66\151\156\x69\x73\150\145\144"); } }
