<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('password_rules')->insert([
            [
                'RuleId' => 1,
                'RuleCode' => 'MIN_LENGTH',
                'RuleName' => 'Minimum Password Length',
                'IsEnabled' => 1,
                'RuleValue' => 8,
                'CreatedOn' => '2026-01-07 04:58:52',
                'UpdatedOn' => '2026-01-07 00:07:22',
                'IsActive' => 1,
            ],
            [
                'RuleId' => 2,
                'RuleCode' => 'UPPERCASE',
                'RuleName' => 'At least one uppercase letter',
                'IsEnabled' => 1,
                'RuleValue' => 1,
                'CreatedOn' => '2026-01-07 04:58:52',
                'UpdatedOn' => '2026-01-07 00:07:22',
                'IsActive' => 1,
            ],
            [
                'RuleId' => 3,
                'RuleCode' => 'LOWERCASE',
                'RuleName' => 'At least one lowercase letter',
                'IsEnabled' => 0,
                'RuleValue' => 1,
                'CreatedOn' => '2026-01-07 04:58:52',
                'UpdatedOn' => '2026-01-07 00:07:22',
                'IsActive' => 1,
            ],
            [
                'RuleId' => 4,
                'RuleCode' => 'NUMBER',
                'RuleName' => 'At least one numeric character',
                'IsEnabled' => 0,
                'RuleValue' => 1,
                'CreatedOn' => '2026-01-07 04:58:52',
                'UpdatedOn' => '2026-01-07 00:07:22',
                'IsActive' => 1,
            ],
            [
                'RuleId' => 5,
                'RuleCode' => 'SPECIAL_CHAR',
                'RuleName' => 'At least one special character',
                'IsEnabled' => 0,
                'RuleValue' => 1,
                'CreatedOn' => '2026-01-07 04:58:52',
                'UpdatedOn' => '2026-01-07 00:07:22',
                'IsActive' => 1,
            ],
        ]);
    }
}
