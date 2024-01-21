<?php
/*
* Copyright (C) Incevio Systems, Inc - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Munna Khan <help.zcart@gmail.com>, September 2018
*/
 namespace App\Http\Controllers\Admin; use App\Common\Authorizable; use App\Http\Requests\Validations\ThemeInstallationRequest; use App\Models\SystemConfig; use Illuminate\Http\Request; use Illuminate\Support\Facades\App; use App\Http\Controllers\Controller; use Illuminate\Support\Facades\Log; use Illuminate\Support\Facades\Session; use App\Events\System\SystemConfigUpdated; class ThemeController extends Controller { use Authorizable; public function all() { $storeFrontThemes = collect($this->storeFrontThemes()); $t_theme = active_theme(); $active_theme = $storeFrontThemes->firstWhere("\x73\x6c\165\x67", $t_theme); $storeFrontThemes = $storeFrontThemes->filter(function ($value, $key) use($t_theme) { return $value["\x73\154\x75\x67"] != $t_theme; }); $sellingThemes = collect($this->sellingThemes()); return view("\x61\144\x6d\x69\156\56\x74\150\x65\155\x65\x2e\x69\156\x64\145\x78", compact("\x73\x74\x6f\x72\145\x46\x72\x6f\x6e\x74\124\150\145\155\145\163", "\x61\143\x74\x69\166\145\x5f\x74\x68\x65\x6d\x65", "\x73\x65\154\154\151\x6e\147\124\x68\145\155\x65\163")); } public function initiate(Request $request, $theme) { if (!(config("\141\160\160\56\x64\x65\x6d\x6f") == true && config("\x61\160\160\56\144\x65\142\165\x67") !== true)) { goto V7Nk2; } return back()->with("\x77\x61\x72\x6e\x69\x6e\x67", trans("\x6d\x65\x73\163\141\147\145\163\x2e\x64\x65\155\157\137\x72\x65\163\x74\162\x69\143\x74\x69\x6f\x6e")); V7Nk2: return view("\x61\144\155\151\x6e\56\x74\150\x65\155\x65\56\x5f\x69\x6e\151\x74\x69\141\164\145", compact("\x74\x68\145\x6d\x65")); } public function activate(ThemeInstallationRequest $request, $theme, $type = "\x73\x74\157\x72\x65\x66\162\157\156\x74") { if (!(config("\x61\x70\x70\56\x64\x65\x6d\157") == true)) { goto PMVFF; } Session::put("\x74\150\145\x6d\145", $theme); return back()->with("\163\165\x63\143\x65\x73\x73", trans("\155\x65\163\163\141\147\145\163\x2e\x74\x68\145\155\145\x5f\x61\143\x74\151\166\x61\x74\x65\144", ["\164\150\145\155\x65" => $theme])); PMVFF: $system = SystemConfig::orderBy("\x69\144", "\141\x73\143")->first(); $this->authorize("\x75\160\144\x61\164\145", $system); Log::info("\111\156\163\x74\141\154\154\151\156\x67\40\x74\150\x65\x6d\145\x20" . $theme); try { if ($type == "\x73\145\x6c\154\151\156\147") { goto jkn6K; } $installable = $this->storeFrontThemes($theme); $system->active_theme = $theme; goto pDTE6; jkn6K: $installable = $this->sellingThemes($theme); $system->selling_theme = $theme; pDTE6: preparePackageInstallation(array_merge($request->all(), $installable)); } catch (\Exception $exception) { Log::info("\124\150\145\x6d\145\x20\151\156\163\164\x61\x6c\x6c\x61\x74\151\157\x6e\x20\x66\x61\151\154\x65\x64\40" . $theme); Log::error(get_exception_message($exception)); return back()->with("\145\162\x72\157\x72", $exception->getMessage()); } if (!$system->save()) { goto YCEmj; } event(new SystemConfigUpdated($system)); return back()->with("\x73\x75\x63\x63\145\163\163", trans("\x6d\145\x73\163\141\x67\145\163\x2e\164\150\x65\x6d\x65\x5f\141\143\x74\x69\166\x61\x74\x65\144", ["\x74\x68\145\155\145" => $theme])); YCEmj: return back()->with("\x65\x72\x72\157\162", trans("\x6d\x65\163\x73\141\147\x65\x73\56\146\141\151\154\x65\x64")); } private function storeFrontThemes($slug = null) { $storeFrontThemes = []; foreach (glob(theme_path("\52"), GLOB_ONLYDIR) as $themeFolder) { $themeFolder = realpath($themeFolder); if (!file_exists($jsonFilename = $themeFolder . "\57" . "\164\150\145\155\x65\x2e\152\163\157\x6e")) { goto VEB2n; } $folders = explode(DIRECTORY_SEPARATOR, $themeFolder); $themeName = end($folders); $data = []; $json = file_get_contents($jsonFilename); if (!($json !== '')) { goto zkOHP; } $data = json_decode($json, true); if (!($data === null)) { goto tHvN_; } throw new \Exception("\x49\x6e\166\141\154\151\x64\40\164\150\x65\x6d\145\x2e\x6a\x73\x6f\156\x20\146\151\154\x65\x20\x61\164\x20\x5b{$themeFolder}\x5d"); tHvN_: if (!(!$data["\162\x65\x6c\x65\x61\x73\x65\x64"] && App::environment(["\160\x72\157\144\x75\x63\x74\x69\157\156"]))) { goto DEMO3; } goto HdQPf; DEMO3: zkOHP: if (!($slug && $data["\x73\154\165\147"] == $slug)) { goto cTMQo; } $data["\x70\x61\164\x68"] = $themeFolder; return $data; cTMQo: $data["\141\x73\x73\145\x74\163\x2d\160\141\x74\150"] = theme_assets_path($data["\163\154\x75\x67"]); $data["\x76\x69\x65\167\163\55\160\x61\x74\x68"] = theme_views_path($data["\x73\x6c\165\x67"]); $storeFrontThemes[] = $data; VEB2n: HdQPf: } beVXW: usort($storeFrontThemes, function ($x, $y) { return strnatcmp($x["\x6e\x61\x6d\x65"], $y["\156\x61\x6d\x65"]); }); return $storeFrontThemes; } private function sellingThemes($slug = null) { $sellingThemes = []; foreach (glob(selling_theme_path("\52"), GLOB_ONLYDIR) as $themeFolder) { $themeFolder = realpath($themeFolder); if (!file_exists($jsonFilename = $themeFolder . "\57" . "\164\x68\x65\155\x65\x2e\152\x73\x6f\x6e")) { goto Z2sJK; } $folders = explode(DIRECTORY_SEPARATOR, $themeFolder); $themeName = end($folders); $data = []; $json = file_get_contents($jsonFilename); if (!($json !== '')) { goto s01eS; } $data = json_decode($json, true); if (!($data === null)) { goto FMiCz; } throw new \Exception("\111\156\166\x61\x6c\151\144\x20\x74\x68\x65\155\145\56\x6a\163\157\156\x20\146\x69\154\145\x20\x61\x74\40\133{$themeFolder}\x5d"); FMiCz: s01eS: if (!($slug && $data["\x73\x6c\165\147"] == $slug)) { goto epaG6; } $data["\160\x61\164\x68"] = $themeFolder; return $data; epaG6: $data["\141\163\x73\145\164\x73\55\160\x61\x74\x68"] = selling_theme_assets_path($data["\163\x6c\165\x67"]); $data["\166\x69\x65\x77\163\x2d\160\x61\164\150"] = selling_theme_views_path($data["\x73\154\165\147"]); $sellingThemes[] = $data; Z2sJK: ey3FI: } tqZbi: usort($sellingThemes, function ($x, $y) { return strnatcmp($x["\156\x61\x6d\145"], $y["\156\141\155\x65"]); }); return $sellingThemes; } }