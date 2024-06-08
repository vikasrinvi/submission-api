# Submission API

## Setup

1. Clone the repository.
2. Install dependencies: `composer install`
3. Configure your `.env` file.
4. Run migrations: `php artisan migrate`
5. Start the server: `php artisan serve`

## Testing the API

1. Use a tool like Postman or CURL to test the endpoint.
2. Send a POST request to `/api/submit` with the following JSON payload:
   ```json
   {
       "name": "John Doe",
       "email": "john.doe@example.com",
       "message": "This is a test message."
   }
