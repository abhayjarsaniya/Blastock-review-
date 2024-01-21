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
 namespace App\Http\Controllers\Installer; use Exception; use Illuminate\Http\Request; use Illuminate\Routing\Controller; use Illuminate\Support\Facades\DB; class ActivateController extends Controller { public function activate() { if ($this->checkDatabaseConnection()) { goto u32TW; } return redirect()->back()->withErrors(["\144\141\x74\141\x62\141\x73\x65\137\143\157\156\x6e\x65\x63\x74\151\157\156" => trans("\x69\156\x73\x74\x61\154\154\x65\x72\137\155\145\163\163\141\147\145\x73\56\x65\x6e\166\x69\162\157\x6e\x6d\145\x6e\164\56\167\151\172\141\x72\144\x2e\x66\x6f\162\x6d\56\144\x62\137\x63\x6f\156\x6e\x65\x63\164\151\x6f\156\137\x66\x61\151\x6c\145\144")]); u32TW: return view("\151\x6e\x73\164\141\x6c\x6c\x65\x72\56\x61\143\164\151\x76\x61\x74\x65"); } public function verify(Request $request) { $mysqli_connection = getMysqliConnection(); if ($mysqli_connection) { goto WzpdJ; } return redirect()->route("\111\x6e\x73\x74\x61\154\x6c\x65\162\56\141\x63\164\151\166\141\164\145")->with(["\146\141\x69\154\145\144" => trans("\162\x65\x73\160\x6f\156\x73\145\163\x2e\x64\x61\164\x61\142\x61\163\x65\137\x63\157\x6e\156\x65\x63\164\151\157\x6e\x5f\146\141\x69\x6c\145\x64")])->withInput($request->all()); WzpdJ: $purchase_verification = aplVerifyEnvatoPurchase($request->purchase_code); if (empty($purchase_verification)) { goto m36MQ; } return redirect()->route("\x49\156\x73\164\141\x6c\154\145\162\x2e\141\x63\x74\151\166\x61\164\x65")->with(["\x66\x61\x69\154\x65\144" => "\x43\x6f\x6e\x6e\145\143\164\x69\157\x6e" . "\40\x74\157\x20\x72\145\155\157\164\x65\40" . "\163\x65\x72\x76\145\162\x20\x63\141\156\x27\164\40\142\145" . "\40\x65\x73\x74\141\142\x6c\151\x73\150\x65\144"])->withInput($request->all()); m36MQ: $license_notifications_array = incevioVerify($request->root_url, $request->email_address, $request->purchase_code, $mysqli_connection); if (!($license_notifications_array["\156\157\x74\151\146\x69\143\141\164\x69\x6f\x6e\137\143\141\x73\x65"] == "\156\157\x74\x69\146\151\143\141\x74\151\x6f\156\137\154\151\x63\145\156\163\145\x5f\157\153")) { goto DROcE; } return view("\x69\156\x73\164\x61\154\154\145\162\x2e\x69\156\x73\x74\141\154\x6c", compact("\x6c\x69\x63\145\156\x73\x65\137\x6e\157\164\151\x66\x69\143\x61\x74\151\157\156\x73\x5f\141\x72\162\141\x79")); DROcE: if (!($license_notifications_array["\156\x6f\x74\x69\146\151\x63\141\164\x69\157\x6e\x5f\x63\141\x73\145"] == "\156\157\164\x69\146\151\143\x61\x74\x69\x6f\x6e\x5f\x61\x6c\162\x65\x61\144\x79\137\151\x6e\163\164\141\x6c\x6c\x65\x64")) { goto mQM6h; } $license_notifications_array = incevioAutoloadHelpers($mysqli_connection, 1); if (!($license_notifications_array["\x6e\x6f\164\151\146\151\143\x61\164\151\x6f\x6e\x5f\143\141\x73\145"] == "\x6e\157\164\x69\146\x69\143\x61\x74\151\x6f\x6e\x5f\x6c\151\143\145\156\163\145\137\x6f\153")) { goto KIkVT; } return view("\x69\x6e\x73\164\141\x6c\154\145\x72\56\151\156\x73\x74\141\x6c\154", compact("\154\151\143\x65\156\163\145\x5f\x6e\x6f\164\x69\146\x69\143\141\x74\x69\x6f\x6e\163\137\x61\x72\x72\x61\x79")); KIkVT: mQM6h: return redirect()->route("\111\156\x73\164\x61\154\154\x65\x72\x2e\141\143\x74\151\x76\141\164\x65")->with(["\146\x61\x69\154\x65\x64" => $license_notifications_array["\156\157\164\x69\146\151\143\141\x74\151\157\156\x5f\164\x65\x78\164"]])->withInput($request->all()); } private function checkDatabaseConnection() { try { DB::connection()->getPdo(); return true; } catch (Exception $e) { return false; } } private function response($message, $status = "\144\x61\156\147\x65\162") { return ["\163\x74\x61\164\165\163" => $status, "\155\145\x73\163\x61\147\145" => $message]; } }