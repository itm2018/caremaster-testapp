<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyUpdateRequest;
use App\Mail\CompanyCreated;
use App\Models\Company;
use http\Exception\UnexpectedValueException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::simplePaginate(10);
        return view('admin.companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companyCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyUpdateRequest $request)
    {
        /*
         * try to store new company
         * return error message if unsuccessfully
         */
        try {
            $company = new Company($request->validated());
            /*
             * Save logo if exists
             */
            if ($request->hasFile('logo')) {
                $oriName = $request->file('logo')->getClientOriginalName();
                //add a timestamp to make sure image name is unique
                $uniqueName = time() . $oriName;
                $path = 'logos/' . $uniqueName;
                Storage::disk('local')->put($path, file_get_contents($request->file('logo')));
                $company->setAttribute('logo', $uniqueName);
            }
            if ($company->save()) {
                /**
                 * Send mail if company was created
                 */
                try {
                    Mail::to(env('MAIL_TO_ADDRESS'))->send(new CompanyCreated($company));
                    Log::log('info', 'Sent mail to ' . env('MAIL_TO_ADDRESS'));
                } catch (\Exception $e) {
                    Log::warning($e->getMessage());
                }
            }

            return redirect(route('company.edit', $company))->with('success', 'You have successfully created a new company');
        } catch (QueryException $q) {
            $message = $q->getMessage();
            if ($q->getCode() == 23000) {
//                $message = substr($q->getMessage(), 0,30);
                $message = 'Duplicated data';
            }
            return redirect(route('company.create'))->with('error', $message);
        } catch (\Exception $e) {
            return redirect(route('company.create'))->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        if (!$company) {
            throw new NotFoundHttpException();
        }
        return view('admin.company', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        if (!$company) {
            throw new NotFoundHttpException();
        }
        return view('admin.company', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        try {
            $company->fill($request->validated());
            /*
             * Save logo if exists
             */
            if ($request->hasFile('logo')) {
                $oriName = $request->file('logo')->getClientOriginalName();
                //add a timestamp to make sure image name is unique
                $uniqueName = time() . $oriName;
                $path = 'logos/' . $uniqueName;
                Storage::disk('local')->put($path, file_get_contents($request->file('logo')));
                $company->setAttribute('logo', $uniqueName);
            }
            $company->save();
            return redirect(route('company.edit', $company))->with('success', 'Company has been saved');
        } catch (\Exception $e) {
            return redirect(route('company.edit', $company))->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if ($company) {
            try {
                $company->delete();
            } catch (QueryException $queryException) {
                return redirect(route('company.index'))->with('error', 'This company has employees, you need to remove all of them from this company before remove it.');
            }
        }
        return redirect(route('company.index'))->with('success', 'You have successfully deleted a company');
    }
}
