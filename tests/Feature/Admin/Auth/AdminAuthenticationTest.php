<?php

namespace Tests\Feature\Admin\Auth;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Tests\TestCase;

test('admin login screen can be rendered', function () {
    $response = $this->get('/admin/login');
    $response->assertStatus(200);
});


test('admin can authenticate using the admin login screen', function () {
    $admin = Admin::factory()->create();

    $response = $this->post('/admin/login', [
        'email' => $admin->email,
        'password' => 'password',
    ]);
    $response->assertRedirect('/admin');
    $this->assertAuthenticatedAs($admin, 'admin');
});

test('admin cannot authenticate using wrong credentials', function () {
    $admin = Admin::factory()->create();

    $this->post('/admin/login', [
        'email' => $admin->email,
        'password' => 'wrong-password',
    ]);
    $this->assertGuest();
});

test ('test admin user cannot view a login form when authenticated', function (){
    $admin = Admin::factory()->create();

    $response = $this->post('/admin/login', [
        'email' => $admin->email,
        'password' => 'password',
    ]);

    $this->actingAs($admin, 'admin')->get('/admin/login');

    $response->assertRedirect('/admin');
});

test('user cannot access companies action when not login', function (){
    $response = $this->get('admin/company');
    $response->assertRedirect('/admin/login');
});

test('user cannot access employees action when not login', function (){
    $response = $this->get('admin/employee');
    $response->assertRedirect('/admin/login');
});

test('admin can access companies action when authenticated', function (){
    $admin = Admin::factory()->create();

    $this->post('/admin/login', [
        'email' => $admin->email,
        'password' => 'password',
    ]);
    $response = $this->actingAs($admin, 'admin')->get('admin/company');
    $response->assertStatus(200);
});

test('admin can access employees action when authenticated', function (){
    $admin = Admin::factory()->create();

    $this->post('/admin/login', [
        'email' => $admin->email,
        'password' => 'password',
    ]);
    $response = $this->actingAs($admin, 'admin')->get('admin/employee');
    $response->assertStatus(200);
});
