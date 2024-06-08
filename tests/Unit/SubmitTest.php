<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmitTest extends TestCase {
	/**
	 * A basic test example.
	 */
	use RefreshDatabase;
	public function testSubmission(): void {

		$response = $this->postJson('/api/submit', [
			'name' => 'John Doe',
			'email' => 'john.doe@example.com',
			'message' => 'This is a test message.',
		]);

		$response->assertStatus(202)
			->assertJson(['message' => 'Submission queued for processing']);

	}
}