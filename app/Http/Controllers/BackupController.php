<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;

class BackupController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
        return view('backend.backup.index');
    }

    /**
     * back up database sql format.
     *
     */
    public function backup()
    { 
        try {
            $filePath = public_path("sql_backup");
            // $fileName = $filePath . 'backup at '. (new \DateTime())->format('Y-m-d H:i:s a').'.sql';
            $fileName = $filePath . '/backup at '. (new \DateTime())->format('Y-m-d H a').'.sql';
            $fh = \fopen($fileName, 'w+'); 

            fwrite($fh, "USE iqs_bd\n\n");
    
            $results = DB::select('SHOW TABLES');  
            
            foreach ($results as $key => $value) {
                
                $table = $value->Tables_in_iqsbdcom_iqs_bd_billal;
    
                $records = DB::table($table)->get();
    
    
                $this->writeBackupFile($fh, $table, $records);
            }
    
            \fclose($fh);
        } catch (\Exception $ex) {
            die($ex->getMessage());
        }    
        return redirect('/admin/backup')->with('success', ' Data Successfully Backuped!');    
    }


    private function writeBackupFile($fh, $tableName, $records)
    {
        if (count($records) === 0) {
            return false;
        }
        
        // $columnArr = DB::select("SHOW COLUMNS FROM {$tableName}");
        // dump($columnArr);
        // $columnList = [];

        // foreach ($columnArr as $columnObj) {
        //     $columnList[] = $columnObj->Field;
        // }

        // dump($columnList);
        $valueList = [];

        foreach ($records as $record) {
            $valueArr = (array)$record;
            $valueList[] = "('" . implode("','", $valueArr) . "')";
        }

        //dump($valueList);
        $values = implode(',', $valueList);

        $insertStatement = "INSERT INTO {$tableName} VALUES {$values};";
        $truncateStatement = "\n\nTRUNCATE {$tableName};";

        fwrite($fh, $truncateStatement);
        fwrite($fh, "\n\n");
        fwrite($fh, \str_replace("''", "NULL", $insertStatement));
    }

   
   

}
