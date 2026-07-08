<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
        ]);
        // User::factory(10)->create();


        // User::factory()->create([
        //     'name' => 'Jhon Fabio Cardona',
        //     'email' => 'admin@filament.test',
        //     'password' => bcrypt('password'),
        //     'app_authentication_secret' => 'eyJpdiI6ImsycGtEY3EzamlvMkFuNktZQkIxdWc9PSIsInZhbHVlIjoieWo0bG1FeFI0UDByL1Z0SmtIU2U3MTBZbFRqN2N1VlVFSURDQ1VZVjlpYz0iLCJtYWMiOiJlNzA3MzY3ODAwMjllMmMzODYxOGQyMWE0ZjAwYjIzNGIxOGU5MTY2NjU5MzAyODZiNmRiMWQ4YzYxOTIyMTYzIiwidGFnIjoiIn0=',
        //     'app_authentication_recovery_codes' => 'eyJpdiI6IjhYVlV5V3ZubDBud01FY1dYUVNXYlE9PSIsInZhbHVlIjoiVjA1dTVncTM1bmlSeTliVWFPcXN6dUFoL3pBRVdXaTVQZjZOVFdQS0R6Y3NDMVBjbmRLRUhtRGFhejE4SUVlbnZRUWhYMVBqNmdvK21oZFBieTVldU1aWW9kMXJVUWQ1VW5vWVN6SWU5S3BsZnpZdkJUUUF6dUJDRmVnSkpUeVRUSVVpbkZ2TndhOXRrTkY2NmdNbjFpeG1JbnFVSlJ4U1BneHRGQlI3bDVzbDRBbE45Rjg5emhkdE9CYTdtS3dWWWhldlp2TTMyV1lBUVVXbDYyZ2ZRVmNRRlAvOTlSc1JpVGZCMkdxMmRuOVl2SldEbEE3MENZWiswdlVzWHpJVjE1T0RIMU9pS3BtcURFUHIvYmd6bE5xTWNWc05ZejVkTlh3NDU0L2YrWWI1blFTK3d5WjhOb2cxbDZKMVh4WDdIcHhIc3Y1VHVIUzc1cy9tQTNPbjV6Vkl1MVAzNlZyS1JHc1ZBOUYrTTlvRHRsdENheFZuT1Frait6MTROdlB5WlVQNk56ZUREQlVwN0JJTnJKMVVkVjR5MmZtT1Q3SXkvY01TVGg1bHJMaHRPdW44U1VjeUdoVWRYc1dldGlUWWtCV0dSMDZmV3k3Vm9yaW1PL0tFOEorWFZvNHNWbUF0YkZQZ3Y0cUNETER0TE1WRmU3SlAydjNLbVMxSHVQQWJaYUZwc2FLT1ZNS0lvV3RSK3B3QmxRYUh4emY5MHBrRFZJdm5KYTAveFpqREI1M3RwdWxxSGVJSnpwY2srZmdSeEkyUzVKcWtneGhydzRjbXJCZ3FmV0dMZWpDeGI4TkFEOTBBaHB6TzBoaU5zQ2lHZTY3YTRicmZQM3VXcFZPYllqNzgwRldDVGtta0xWYWs5ZlNwVU52cGcxcVpjZHdTdGZ6c1VROTFML0FMdVNlYjY3cFprK1lUUUVwYXNuY1QzSFN5Mmh5bmgrbDIyK2lWSm5qak4vaTNwbGJWb3lFU0JOV3daaXhwZHRBUDMrOFVmUENUN0o4Sy9ZQzNySG5uSjV2b1dvOGtrNWlPeWNta1RZdExlZz09IiwibWFjIjoiZDZjYjFhMjUxMDhkZTZlZTJhNTU2OGY3MTI1ZjZjYmE1ZWExZTY5MjY3YzlhNTQ4NTVmNWVhYTM5ODMxMjQxZCIsInRhZyI6IiJ9',

        // ]);
    }
}
