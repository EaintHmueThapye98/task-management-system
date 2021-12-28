<?php
namespace App\Services\Employee;

use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use App\Interfaces\Dao\Employee\EmployeeDaoInterface;
use Illuminate\Support\Facades\Storage;
use Mail;

class EmployeeService implements EmployeeServiceInterface{
    private $employeeDao;

    /**
     * Class Constructor
     * 
     * @param EmployeeDaoInterface $employeeDao 
     */
    public function __construct(EmployeeDaoInterface $employeeDao)
    {
        $this->employeeDao = $employeeDao;
    }

    /**
     * Create new employee and store data to table
     * 
     * @param EmployeeRequest $request
     * @return object
     */
    public function addNewEmployee($request)
    {
        $result=$this->employeeDao->addNewEmployee($request);
        return $result;
    }
     /**
     * Create new employee and store data to table
     * 
     * @param EmployeeRequest $request, int $id
     */
    public function editEmployee($request, $id)
    {
        if(empty($request->profile))
        {
            $request->profile = $request->old_profile;
        }
        $name = null;
        if(!(is_string($request->profile))){
            $name = $request->employee_id.'.'.$request->profile->getClientOriginalExtension();
            $path = 'test/'.$name;
            Storage::disk('s3')->put($path, file_get_contents($request->profile));
            // $imagePath = 'https://jobscale-dev.s3.ap-northeast-1.amazonaws.com/test/'.$name;
            $request->profile = $name;
        }
        $result = $this->employeeDao->editEmployee($request, $id);
        return $result;
    }
    /**
     * Search employee by ID or name.
     * 
     * @param Request $request
     * @return object
     */
    public function searchEmployee($request)
    {
        $search_result = $this->employeeDao->searchEmployee($request);
        return $search_result;
    }
    /**
     * Delete record of specific employee.
     * 
     * @param $id
     */
    public function deleteEmployee($id)
    {
        return $this->employeeDao->deleteEmployee($id);
    }
    /**
     * Check user for edit profile action.
     * 
     */
    public function getEmployeePosition($id)
    {
        return $this->employeeDao->getEmployeePosition($id);
    }
}
