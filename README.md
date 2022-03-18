<div id="top"></div>

[![LinkedIn][linkedin-shield]][linkedin-url]


<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/github_username/repo_name">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Game API</h3>

  <p align="center">
    A fun project to develop my PHP skills utilising the Laravel framework to make API calls to the IGDB allowing users to see popular games & search their favourites.
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
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)

Here's a blank template to get started: To avoid retyping too much info. Do a search and replace with your text editor for the following: `github_username`, `repo_name`, `twitter_handle`, `linkedin_username`, `email_client`, `email`, `project_title`, `project_description`

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [Laravel](https://laravel.com)
* [Tailwind](https://tailwindcss.com/)
* [Livewire](https://laravel-livewire.com/)
* [Angular](https://angular.io/)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* npm
  ```sh
  componser
  ```

### Installation
i9
<h2> Account Creation </h2>
**Taken from IGBD

In order to use our API, you must have a Twitch Account.

The IGDB.com API is free for non-commercial usage under the terms of the Twitch Developer Service Agreement.

Sign Up with Twitch for a free account
Ensure you have Two Factor Authentication enabled
Register your application
Manage your newly created application
Generate a Client Secret by pressing [New Secret]
Take note of the Client ID and Client Secret
Authentication
Now that you have a Client ID and Client Secret you will be authenticating as a Twitch Developer using oauth2. Detailed information can be found on the Twitch Developer Docs.

<h2> Authentication </h2>
Now that you have a Client ID and Client Secret you will be authenticating as a Twitch Developer using oauth2. Detailed information can be found on the Twitch Developer Docs.

Doing so will give you an access token that is used for future requests to our API.

Make a POST request to https://id.twitch.tv/oauth2/token with the following query string parameters, substituting your Client ID and Client Secret accordingly.

client_id=Client ID

client_secret=Client Secret

grant_type=client_credentials

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


Requests



1. Get your free API Key at [https://example.com](https://example.com)
2. Clone the repo
   ```sh
   git clone https://github.com/github_username/repo_name.git
   ```
3. Install NPM packages
   ```sh
   npm install
   ```
4. Enter your API in `config.js`
   ```js
   const API_KEY = 'ENTER YOUR API';
   ```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact


Project Link: [https://github.com/JordHemsworth/GameAPI](https://github.com/JordHemsworth/GameAPI)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

* []()
* []()
* []()

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[linkedin-url]: https://www.linkedin.com/in/jordan-hemsworth-8a66bb175/
[product-screenshot]: images/screenshot.jpg