<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nav</title>
    <link rel="stylesheet" href="/css/nav.css">
</head>

<body>
    <div class="first_side">
        <div class="cnt">
            {{-- Nav links of the first side --}}
            <ul class="nav">
                <a href="/">
                    <div class="logo"><img class="tw-icon" src="/icon/twitter.svg" alt=""></div>
                </a>
                <a href="/" class="{{Route::currentRouteName() == 'home' ? 'active' : ''}} li"><img class="nav-icon" src="/icon/house.svg">
                    <li>Home</li>
                </a>
                <a href="/explore" class="{{Route::currentRouteName() == 'explore' ? 'active' : ''}} li"><img class="nav-icon" src="/icon/hash.svg">
                    <li>Explore</li>
                </a>
                <a href="/notification" class="{{Route::currentRouteName() == 'notification' ? 'active' : ''}} li"><img class="nav-icon" src="/icon/bell.svg">
                    <li>Notifications</li>
                </a>
                <a href="/message" class="{{Route::currentRouteName() == 'message' ? 'active' : ''}} li"><img class="nav-icon" src="/icon/envelope.svg">
                    <li>Message</li>
                </a>
                <a href="/bookmark" class="{{Route::currentRouteName() == 'bookmark' ? 'active' : ''}} li"><img class="nav-icon" src="/icon/bookmark.svg">
                    <li>Bookmark</li>
                </a>
                <a href="/list" class="{{Route::currentRouteName() == 'list' ? 'active' : ''}} li"><img class="nav-icon" src="/icon/list-ul.svg">
                    <li>List</li>
                </a>
                <a href="/profile" class="{{Route::currentRouteName() == 'profile' ? 'active' : ''}} li"><img class="nav-icon" src="/icon/person.svg">
                    <li>Profile</li>
                </a>
                <a href="/edit" class="{{Route::currentRouteName() == 'edit' ? 'active' : ''}} li"><img class="nav-icon" src="/icon/three-dots.svg">
                    <li>More</li>
                </a>
                {{-- <a href="/" class="tweet">+</a> later--}}
                <a href="/" class="tweet-pc">Tweet</a>
            </ul>
            {{-- Div of the profile shortcut at the bottom left --}}
            <div class="profile-container">
                <form class="l-out" id="logout" action="/logout"><button class="log-out">Log out {{'@' . auth()->user()->username}}</button></form>
                <div class="profile">
                    <div class="profile-cnt">
                        <img class="p-photo" src="{{auth()->user()->profile->pphoto ? asset('storage/' . auth()->user()->profile->pphoto) : asset('images/default.jpeg')}}" alt="">
                        <div class="text">
                            <p class="username">{{ auth()->user()->name}}</p>
                            <p>{{'@'. auth()->user()->username}}</p>
                        </div>
                    </div>
                    <div class="opt">
                        <img class="llo" onclick="s()" style="cursor: pointer;" src="/icon/three-dots.svg" alt="">
                    </div>
                </div>
                <div class="theme-container shadow-dark">
                    <img id="theme-icon" src="https://www.uplooder.net/img/image/2/addf703a24a12d030968858e0879b11e/moon.svg" alt="ERR">
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    function s() {
        var first = document.getElementById("logout");
        first.classList.toggle("l-out");
    }

    function f() {
        document.getElementById("follow").innerHTML = "Following";
        document.getElementById("follow").style.backgroundColor = "white";
        document.getElementById("follow").style.color = "black";
    }
    document.body.style="background-color: var(--bs-dark);transition: 0.5s;"
const sun = "https://www.uplooder.net/img/image/55/7aa9993fc291bc170abea048589896cf/sun.svg";
const moon = "https://www.uplooder.net/img/image/2/addf703a24a12d030968858e0879b11e/moon.svg"

var theme = "dark";
  const root = document.querySelector(":root");
  const container = document.getElementsByClassName("theme-container")[0];
  const themeIcon = document.getElementById("theme-icon");
  container.addEventListener("click", setTheme);
  function setTheme() {
    switch (theme) {
      case "dark":
        setLight();
        theme = "light";
        break;
      case "light":
        setDark();
        theme = "dark";
        break;
    }
  }
  function setLight() {
    root.style.setProperty(
      "--bs-dark",
      "linear-gradient(318.32deg, #c3d1e4 0%, #dde7f3 55%, #d4e0ed 100%)"
    );
    container.classList.remove("shadow-dark");
    setTimeout(() => {
      container.classList.add("shadow-light");
      themeIcon.classList.remove("change");
    }, 300);
    themeIcon.classList.add("change");
    themeIcon.src = sun;
  }
  function setDark() {
    root.style.setProperty("--bs-dark", "#212529");
    container.classList.remove("shadow-light");
    setTimeout(() => {
      container.classList.add("shadow-dark");
      themeIcon.classList.remove("change");
    }, 300);
    themeIcon.classList.add("change");
    themeIcon.src = moon;
  }
</script>
@yield('nav-link')

</html>