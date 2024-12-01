<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Uuid;
class CSVController extends Controller
{
    public function importCsv()
    {
        // Path to your CSV file
        $filePath = public_path('ecom_doctors_new.csv');

        // Open the CSV file
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Skip the header row if your CSV has headers
            fgetcsv($handle);

            // Loop through each row of the CSV
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                // Adjust the indices according to your CSV structure
                $id = $data[0]; 
                $email = $data[1]; // Assuming the first column is email
                $phone = $data[2];  // Assuming the second column is name
                $doctor_fname = $data[3]; // Assuming the third column is password
                $doctor_lname = $data[4];
                $password = $data[5];
                $image = $data[6];
                $doctor_address= $data[7];
                $doctor_city= $data[8];
                $doctor_country= $data[9];
                $doctor_country_id= $data[10];
                $state_name= $data[11];
                $city_id= $data[12];
                $status= $data[13];
                $otp =$data[14];
                $occupation= $data[19];
                $institution= $data[20];

                // Validate data
                $validator = Validator::make(
                    [
                        'email' => $email,
                        'password' => $password,
                    ],
                    [
                        'email' => 'required|email|unique:users,email',
                        'password' => 'required|string|min:6',
                    ]
                );

                if ($validator->fails()) {
                    // Handle validation failure (optional)
                    continue;
                }

                // Insert data into the users table
                DB::table('users')->insert([
                    'id' =>$id,
                    'user_code' => Uuid::generate(4),
                    'email' => $email,
                    'name' => $doctor_fname,
                    'doctor_fname' => $doctor_fname,
                    'doctor_lname' => $doctor_lname,
                    'doctor_mobile' => $phone,
                    'profile_image' => $image,
                    'country' => $doctor_country,
                    'country_id' => $doctor_country_id,
                    'status' => $status,
                    'occupation' => $occupation,
                    'institution' => $institution,
                    'profile_image' => $image,
                    'password' => Hash::make($password), // Hashing the password
                    'profile_image' => $image,
                    'type'=>'User',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Close the file
            fclose($handle);
        }

        return "CSV data has been imported into the users table successfully!";
    }

    public function importPatientCsv()
    {
        // Path to your CSV file
        $filePath = public_path('Patientdata.csv');

        // Open the CSV file
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Skip the header row if your CSV has headers
            fgetcsv($handle);

            // Loop through each row of the CSV
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                // Adjust the indices according to your CSV structure
                $id = $data[0]??""; 
                $doctor_id = $data[1]??""; 
                $patient_name = $data[2]??""; 
                $phone = $data[3]??"";  // Assuming the second column is name
              // Assuming the third column is password
                $alt_phone = $data[4]??"";
                $patient_profile = $data[5]??"";
                $dob = $data[6]??"";
                $age= $data[7]??"";
                $gender= $data[8]??"";
                $martial_status= $data[9]??"";
                $occupation= $data[10]??"";
                $address= $data[11]??"";
                $city= $data[12]??"";
                $smoke_category= $data[13]??"";
                $smoke_items =$data[14]??"";
                $alcohol= $data[15]??"";
                $alcohol_duration= $data[16]??"";
                $other_drugs= $data[17]??"";
                $medical_history= $data[18]??"";
                $last_shedule_date= $data[19]??"";
                $next_shedule_date= $data[20]??"";
                $no_coun_completed= $data[21]??"";
                $count_session= $data[22]??"";
                $data_new= $data[23]??"";
                $session1_data= $data[24]??"";
                $session2_data= $data[25]??"";
                $session3_data= $data[26]??"";
                $status= $data[27]??"";
                $otp= $data[28]??"";
                $created_at= $data[29]??now();
                $updated_at= $data[30]??now();
                $patient_occupation= $data[31]??"";
                $other_drug_name= $data[32]??"";
                $smokeless_data= $data[33]??"";
                $smoked_data= $data[34]??"";
                $smoked_title= $data[35]??"";
                $smokedless_title= $data[36]??"";


                // Validate data
                $validator = Validator::make(
                    [
                        'patient_name' => $patient_name,
                    ],
                    [
                        'patient_name' => 'required',
                    ]
                );

                if ($validator->fails()) {
                    // Handle validation failure (optional)
                    continue;
                }

                // Insert data into the users table
                DB::table('patients')->insert([
                    'id' =>$id,
                    'doctor_id' => $doctor_id,
                    'patient_name' => $patient_name,
                    'patient_mobile' => $phone,
                    'alternative_number' => $alt_phone,
                    'patient_profile' => $patient_profile,
                    'patient_dob' => $dob,
                    'patient_age' => $age,
                    'gender' => $gender,
                    'marital_status' => $martial_status,
                    'occupation' => $occupation,
                    'patient_address' => $address,
                    'patient_city' => $city, // Hashing the password
                    'smoke_category' => $smoke_category,

                    'smoke_items' => $smoke_items,
                    'alchohol' => $alcohol,
                    'alchohol_duration' => $alcohol_duration,
                    'other_drugs' => $other_drugs,
                    'medical_history' => $medical_history, // Hashing the password
                    'last_schedule_date' => $last_shedule_date,

                    'next_schedule_date' => $next_shedule_date,
                    'no_coun_completed' => $no_coun_completed,
                    'count_session' => $count_session,
                    // 'data' => $data_new,
                    // 'session1_data' => $session1_data,
                    // 'session2_data' => $session2_data,
                    // 'session3_data' =>  $session3_data,

                    'patient_status' => $status,
                    'otp' => $otp,
                    'other_drugs_name' => $other_drug_name,
                    'patient_occupation' => $patient_occupation,
                    'created_at' => $created_at,
                    // 'updated_at' => $updated_at,
                ]);
            }

            // Close the file
            fclose($handle);
        }

        return "CSV data has been imported into the users table successfully!";
    }

    public function importTestForClient()
    {
        // Path to your CSV file
        $filePath = public_path('testdata.csv');

        // Open the CSV file
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Skip the header row if your CSV has headers
            fgetcsv($handle);

            // Loop through each row of the CSV
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                // Adjust the indices according to your CSV structure
                $id = $data[0]; 
                $patientID = $data[1]??""; // Assuming the first column is email
                $testName = $data[2]??"";  // Assuming the second column is name
                $testData = $data[3]??""; // Assuming the third column is password

                // // Validate data
                // $validator = Validator::make(
                //     [
                //         'email' => $email,
                //         'password' => $password,
                //     ],
                //     [
                //         'email' => 'required|email|unique:users,email',
                //         'password' => 'required|string|min:6',
                //     ]
                // );

                // if ($validator->fails()) {
                //     // Handle validation failure (optional)
                //     continue;
                // }

                // Insert data into the users table
                DB::table('test_for_client')->insert([
                    'id' =>$id,
                    'patient_id' =>$patientID,
                    'test_name' => $testName,
                    'test_data' => $testData,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Close the file
            fclose($handle);
        }

        return "CSV data has been imported into the users table successfully!";
    }
}
