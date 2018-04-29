<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getUserCompany($userId, $companyId)
    {
        $company = Company::findOrFail($companyId);

        return response()->json($company);
    }

    public function saveUserCompany(Request $request, $userId)
    {
        $company = Company::create($request->all());

        $company->users()->sync($userId);

        return response()->json($company);
    }

    public function deleteUserCompany($userId, $companyId)
    {
        // TODO : validasi bahwa ini punya user
        $company = Company::findOrFail($companyId);
        $company->delete();
        $company->users()->detach();

        return response()->json($company);
    }

    public function updateUserCompany(Request $request, $userId, $companyId)
    {
        $company = Company::findOrFail($companyId);
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->city = $request->city;
        $company->address = $request->address;

        $company->update();

        $company->users()->sync($userId);       

        return response()->json($company);
    }
}
