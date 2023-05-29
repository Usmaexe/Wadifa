<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Create fake users : 
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = User::factory()->create([
            'name' => 'Mohammed Achraf',
            'email' => 'MohaAchraf@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer', 
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => "We are seeking a skilled and motivated Software Engineer 
        //     to join our dynamic development team. As a Software Engineer, 
        //     you will play a key role in designing, developing, and maintaining 
        //     high-quality software solutions that meet the needs of our organization 
        //     and customers. You will collaborate with cross-functional teams to translate 
        //     requirements into technical specifications, implement robust and scalable 
        //     softwaresolutions, and contribute to the continuous improvement 
        //     of our software development processes."
        // ]);
        // Listing::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend ,api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.starkindustries.com',
        //     'description' => "We are looking for an experienced and highly skilled Senior 
        //     Database Administrator to join our team. As a Senior Database Administrator, 
        //     you will be responsible for managing and maintaining our organization's databases, 
        //     ensuring their integrity, security, and optimal performance. 
        //     You will work closely with development teams, system administrators, 
        //     and stakeholders to design and implement efficient database solutions 
        //     that support our business requirements. Your expertise and leadership in 
        //     database administration will play a crucial role in ensuring the stability, 
        //     scalability, and reliability of our data infrastructure.." 
        // ]);
    }
}
