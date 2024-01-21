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
 namespace App\Http\Controllers\Installer; use App\Http\Controllers\Installer\Helpers\RequirementsChecker; use Illuminate\Routing\Controller; class RequirementsController extends Controller { protected $requirements; public function __construct(RequirementsChecker $checker) { $this->requirements = $checker; } public function requirements() { $phpSupportInfo = $this->requirements->checkPHPversion(config("\x69\x6e\x73\x74\141\x6c\x6c\x65\x72\56\143\x6f\162\x65\56\x6d\151\x6e\x50\150\160\126\145\162\163\151\157\156"), config("\151\x6e\163\x74\141\154\x6c\145\162\x2e\143\x6f\162\x65\x2e\155\141\x78\120\150\160\126\x65\x72\x73\151\x6f\156")); $requirements = $this->requirements->check(config("\x69\x6e\x73\x74\x61\154\154\145\162\56\x72\x65\x71\165\x69\162\x65\x6d\145\156\x74\163")); return view("\x69\x6e\x73\x74\141\154\x6c\145\x72\56\162\145\x71\x75\x69\162\145\x6d\145\x6e\x74\163", compact("\x72\x65\161\x75\x69\162\x65\x6d\x65\156\164\x73", "\160\x68\160\x53\165\x70\160\x6f\x72\x74\111\156\146\x6f")); } }
