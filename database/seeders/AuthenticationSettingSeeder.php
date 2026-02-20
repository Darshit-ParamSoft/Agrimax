<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthenticationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authentication_settings')->insert([
            [
                'AuthSettingId' => 1,
                'AuthCode' => 'EMAIL_VERIFY',
                'AuthName' => 'Email Verification',
                'IsEnabled' => 0,
                'OTPAttempt' => 3,
                'OTPResetTime' => 1,
                'OTPExpiryTime' => 15,
                'CreatedOn' => '2025-12-22 08:21:50',
                'UpdatedOn' => '2026-01-07 06:32:07',
                'DeletionDate' => null,
                'IsActive' => 1,
                'UserId' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'AuthSettingId' => 2,
                'AuthCode' => 'MOBILE_VERIFY',
                'AuthName' => 'Mobile OTP Verification',
                'IsEnabled' => 0,
                'OTPAttempt' => 3,
                'OTPResetTime' => 2,
                'OTPExpiryTime' => 20,
                'CreatedOn' => '2025-12-22 08:21:50',
                'UpdatedOn' => '2026-01-07 06:32:07',
                'DeletionDate' => null,
                'IsActive' => 1,
                'UserId' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'AuthSettingId' => 3,
                'AuthCode' => 'CAPTCHA',
                'AuthName' => 'Captcha Validation',
                'IsEnabled' => 1,
                'OTPAttempt' => null,
                'OTPResetTime' => null,
                'OTPExpiryTime' => null,
                'CreatedOn' => '2025-12-22 08:21:50',
                'UpdatedOn' => '2026-01-07 06:32:07',
                'DeletionDate' => null,
                'IsActive' => 1,
                'UserId' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'AuthSettingId' => 4,
                'AuthCode' => 'TWO_FACTOR',
                'AuthName' => 'Two Factor Authentication',
                'IsEnabled' => 0,
                'OTPAttempt' => 3,
                'OTPResetTime' => null,
                'OTPExpiryTime' => null,
                'CreatedOn' => '2025-12-22 08:21:50',
                'UpdatedOn' => '2026-01-07 06:32:07',
                'DeletionDate' => null,
                'IsActive' => 1,
                'UserId' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
