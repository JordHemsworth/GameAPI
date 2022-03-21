<div id="top"></div>

LinkedIn: [www.linkedin.com/in/jordanhemsworth](www.linkedin.com/in/jordanhemsworth)


<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/github_username/repo_name">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Game API</h3>

  <p align="center">
    A fun project to develop my PHP skills utilising the Laravel framework to make API calls to the Internet Game Database (IGDB) allowing users to see popular games & search their favourites.
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Screenshot of Site][product-screenshot]](public\images\screenshot.jpg)

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [Laravel](https://laravel.com)
* [Tailwind](https://tailwindcss.com/)
* [Livewire](https://laravel-livewire.com/)
* [Angular](https://angular.io/)
* [IGDB](https://api-docs.igdb.com/#about)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To use this project locally, simply follow the example steps below.

### Prerequisites

First you will need an API key to access the IGDB, follow the steps from the IGDB website below or view on their official website.

<h2> Account Creation </h2>

**Taken from IGDB: [https://api-docs.igdb.com/#about]

In order to use our API, you must have a Twitch Account.

The IGDB.com API is free for non-commercial usage under the terms of the Twitch Developer Service Agreement.

Sign Up with Twitch for a free account

Ensure you have Two Factor Authentication enabled

Register your application

Manage your newly created application

Generate a Client Secret by pressing [New Secret]

Take note of the Client ID and Client Secret


<h2> Authentication </h2>
Now that you have a Client ID and Client Secret you will be authenticating as a Twitch Developer using oauth2. Detailed information can be found on the Twitch Developer Docs.

Doing so will give you an access token that is used for future requests to our API.

Make a POST request to https://id.twitch.tv/oauth2/token with the following query string parameters, substituting your Client ID and Client Secret accordingly.

```
client_id=Client ID

client_secret=Client Secret

grant_type=client_credentials
```

<h3> Example </h3>
If your Client ID is abcdefg12345 and your Client Secret is hijklmn67890, the whole url should look like the following.

https://id.twitch.tv/oauth2/token?client_id=abcdefg12345&client_secret=hijklmn67890&grant_type=client_credentials
The response from this will be a json object containing the access token and the number of second until the token expires.

```

{
  "access_token": "prau3ol6mg5glgek8m89ec2s9q5i3i",
  "expires_in": 5587808,
  "token_type": "bearer"
}
The expires_in shows you the number of seconds before the access_token will expire and must be refreshed.

```

### Installation

To install the site locally, follow the steps below.

1. Clone GitHub repo for this project locally [https://github.com/JordHemsworth/GameAPI](https://github.com/JordHemsworth/GameAPI)

2. CD into the project
   ```sh
   cd GameAPI
   ```
3. Install Composer Dependencies
   ```sh
   composer install
   ```
4. Install NPM packages
   ```sh
   npm install
   ```
5. Create .env file
   ```sh   
   cp .env.example .env
   ```
6. Generate app encryption key
   ```php
   php artisan key:generate
   ```
7. Enter your API details in to `.env` & remove debug bar.
   ```php
   IGDB_KEY= Client ID                    #IGDB API Details
   IGDB_AUTH="Bearer access_token"            

   DEBUGBAR_ENABLED=false              #Disable Livewire debug bar
   ```  
8. Run the application  
   ```sh
   php artisan serve
   ```   

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Project Link: [https://github.com/JordHemsworth/GameAPI](https://github.com/JordHemsworth/GameAPI)

LinkedIn: [www.linkedin.com/in/jordanhemsworth](www.linkedin.com/in/jordanhemsworth)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[linkedin-url]: https://www.linkedin.com/in/jordan-hemsworth-8a66bb175/
[product-screenshot]: public\images\screenshot.jpg