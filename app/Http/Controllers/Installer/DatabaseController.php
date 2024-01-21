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
 namespace App\Http\Controllers\Installer; use App\Http\Controllers\Installer\Helpers\DatabaseManager; use Exception; use Illuminate\Routing\Controller; use Illuminate\Support\Facades\DB; class DatabaseController extends Controller { private $databaseManager; public function __construct(DatabaseManager $databaseManager) { $this->databaseManager = $databaseManager; } public function database() { if ($this->checkDatabaseConnection()) { goto q1WiW; } return redirect()->back()->withErrors(["\x64\141\164\x61\142\141\x73\x65\x5f\143\157\156\156\145\x63\x74\151\x6f\156" => trans("\x69\156\x73\x74\x61\154\154\x65\162\137\155\x65\x73\163\141\147\145\x73\x2e\145\156\x76\x69\162\157\x6e\155\145\x6e\x74\x2e\x77\151\172\141\x72\144\x2e\x66\157\x72\x6d\56\144\142\137\143\x6f\156\x6e\x65\x63\164\x69\x6f\156\x5f\146\x61\151\154\x65\144")]); q1WiW: ini_set("\155\x61\170\137\x65\x78\145\143\165\x74\x69\157\x6e\137\x74\x69\155\145", 600); $response = $this->databaseManager->migrateAndSeed(); return redirect()->route("\111\x6e\x73\164\141\x6c\154\x65\x72\x2e\x66\151\156\x61\154")->with(["\155\x65\163\163\141\147\145" => $response]); } private function checkDatabaseConnection() { try { DB::connection()->getPdo(); return true; } catch (Exception $e) { return false; } } }
