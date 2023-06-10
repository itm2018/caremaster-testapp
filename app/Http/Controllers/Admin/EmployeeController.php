<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::simplePaginate(10);
        return view('admin.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all(['id', 'name']);
        return view('admin.employeeCreate', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeUpdateRequest $request)
    {
        /*
         * try to store new company
         * return error message if unsuccessfully
         */
        try {
            $employee = new Employee($request->validated());
            $employee->save();
            return redirect(route('employee.edit', $employee))->with('success', 'You have successfully created a new employee');
        } catch (QueryException $q) {
            $message = $q->getMessage();
            if ($q->getCode() == 23000) {
//                $message = substr($q->getMessage(), 0,30);
                $message = 'Duplicated data';
            }
            return redirect(route('employee.create'))->with('error', $message);
        } catch (\Exception $e) {
            return redirect(route('employee.create'))->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        if (!$employee) {
            throw new NotFoundHttpException();
        }
        return view('admin.employee', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        if (!$employee) {
            throw new NotFoundHttpException();
        }
        $companies = Company::all(['id', 'name']);
        return view('admin.employee', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        try {
            $employee->fill($request->validated());

            $employee->save();
            return redirect(route('employee.edit', $employee))->with('success', 'Employee has been saved');
        } catch (\Exception $e) {
            return redirect(route('employee.edit', $employee))->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee) {
            try {
                $employee->delete();
            } catch (QueryException $queryException) {
                return redirect(route('employee.index'))->with('error', $queryException->getMessage());
            }
        }
        return redirect(route('employee.index'))->with('success', 'You have successfully deleted a employee');
    }
}
