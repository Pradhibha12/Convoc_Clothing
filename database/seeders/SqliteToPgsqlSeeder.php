<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqliteToPgsqlSeeder extends Seeder
{
    public function run(): void
    {
        // Get all tables from SQLite
        $tables = DB::connection('sqlite')->select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%';");

        foreach ($tables as $table) {
            $tableName = $table->name;
            if ($tableName === 'migrations') {
                continue;
            }

            echo "Syncing table: {$tableName}...\n";

            try {
                // Disable foreign key checks for Postgres
                DB::statement("ALTER TABLE \"{$tableName}\" DISABLE TRIGGER ALL;");
            } catch (\Exception $e) {
                // Ignore if alter trigger fails
            }

            try {
                // Clear destination table
                DB::table($tableName)->truncate();

                // Get records from SQLite
                $records = DB::connection('sqlite')->table($tableName)->get();

                // Insert records into Postgres
                foreach ($records as $record) {
                    $data = (array) $record;
                    DB::table($tableName)->insert($data);
                }
            } catch (\Exception $e) {
                echo "Error syncing table {$tableName}: " . $e->getMessage() . "\n";
            }

            try {
                // Enable foreign key checks
                DB::statement("ALTER TABLE \"{$tableName}\" ENABLE TRIGGER ALL;");
            } catch (\Exception $e) {
                // Ignore
            }
        }
    }
}
