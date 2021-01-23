<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function downloadUserInfo($id){
        $user = User::find($id);
        // output headers so that the file is downloaded rather than displayed
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="yourUserInfo.csv"');

// do not cache the file
        header('Pragma: no-cache');
        header('Expires: 0');

// create a file pointer connected to the output stream
        $file = fopen('php://output', 'w');

// send the column headers
        fputcsv($file, array('Name', 'Mail'));

// Sample data. This can be fetched from mysql too
        $data = array(
            array($user->name, $user->email)
        );

// output each row of the data
        foreach ($data as $row)
        {
            fputcsv($file, $row);
        }
        exit();
    }
}
