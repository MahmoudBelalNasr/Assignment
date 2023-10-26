# Service to list The most popular repositories

This Laravel service provides an API endpoint to retrieve a list of the most popular repositories.

## Installation

1. Clone the repository: `git clone https://github.com/your-username/repositories.git`
2. Navigate to the project directory: `cd repositories`
3. Install dependencies: `composer install`
4. Configure your database settings in the `.env` file.

## Usage

To use the API endpoint, make a GET request to `/api/repositories`.

### Query Parameters

- `per_page`: The number of repositories to retrieve per page (optional).
- `sinceDate`: Retrieve repositories created after the specified date (optional).
- `language`: Filter repositories by language (optional).

### Example Request
GET api/repositories?per_page=10&sinceDate=2023-01-01&language=PHP
`Here we can control search anf filetration from query parameters`


### Example Response
`{
    "data": [
        {
            "id": 1,
            "name": "Repository 1",
            "stars": 100
        },
        {
            "id": 2,
            "name": "Repository 2",
            "stars": 50
        }
    ],
    "status": "true",
    "message": "success"
}`
