<?php
namespace App\Interfaces\Services\Employee;

interface EmployeeServiceInterface{
    /**
     * Create new employee and store new employee data to table.
     * 
     * @param Request $request
     * @return object 
     */
    public function addNewEmployee($request);
    public function editEmployee($request, $id);
    public function searchEmployee($request);
    public function deleteEmployee($id);
    public function getEmployeePosition($id);
}
