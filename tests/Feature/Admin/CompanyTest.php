<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;

test('test send mail when company created', function (){
    $company = Company::factory(1)->definition();
    /*
     * admin login
     */
    $admin = Admin::factory()->create();
    $this->post('/admin/login', [
        'email' => $admin->email,
        'password' => 'password',
    ]);
    /*
     * admin create a new company
     */
    $response = $this->actingAs($admin, 'admin')->post('/admin/company', $company);
    $companies = Company::where('name', $company['name'])->get();
    $objSaved = Company::whereName($company['name'])->first();
    $this->assertCount(1, $companies);
    $response->assertRedirect(route('company.edit',$objSaved));
});
