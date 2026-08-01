<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SqlSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('public/assets/install.sql');
        if (!file_exists($path)) {
            $this->command->error("SQL file not found at: {$path}");
            return;
        }

        $this->command->info("Reading SQL file...");
        
        $handle = fopen($path, "r");
        if (!$handle) {
            $this->command->error("Failed to open SQL file.");
            return;
        }

        $templine = '';
        $count = 0;
        $successCount = 0;
        $failedCount = 0;
        $truncatedTables = [];

        while (($line = fgets($handle)) !== false) {
            $trimmed = trim($line);
            
            // Skip comments and empty lines
            if (empty($trimmed) || str_starts_with($trimmed, '--') || str_starts_with($trimmed, '#') || str_starts_with($trimmed, '/*')) {
                continue;
            }

            $templine .= $line;

            // If it has a semicolon at the end, it's the end of the query
            if (str_ends_with($trimmed, ';')) {
                $query = trim($templine);
                
                // Only process INSERT INTO statements
                if (stripos($query, 'INSERT INTO') === 0) {
                    // Convert MySQL backslash escapes for single quotes to SQLite double single quotes
                    $query = str_replace("\\'", "''", $query);
                    $query = str_replace('\\"', '"', $query);

                    // Parse table name from query
                    preg_match('/INSERT\s+INTO\s+[`"\'\w]+/i', $query, $matches);
                    $tableName = '';
                    if (!empty($matches)) {
                        $tableName = trim(str_replace(['INSERT', 'INTO', '`', '"', "'", ' '], '', $matches[0]));
                    }

                    if ($tableName && !in_array($tableName, $truncatedTables)) {
                        try {
                            if (Schema::hasTable($tableName)) {
                                DB::table($tableName)->delete();
                                $this->command->info("Cleared existing records in {$tableName}.");
                            }
                        } catch (\Exception $e) {
                            $this->command->warn("Failed to clear {$tableName}: " . $e->getMessage());
                        }
                        $truncatedTables[] = $tableName;
                    }

                    try {
                        DB::statement($query);
                        $successCount++;
                    } catch (\Exception $e) {
                        $failedCount++;
                        $this->command->warn("Failed to insert into {$tableName}: " . substr($e->getMessage(), 0, 150));
                    }
                    $count++;
                }
                
                $templine = '';
            }
        }

        fclose($handle);
        $this->command->info("SQL seed completed. Total INSERT queries: {$count}, Success: {$successCount}, Failed: {$failedCount}");
    }
}
