<template>
  <div>
    <div class="col text-center my-name mt-3">
      <h1>
        <div>
          <div class="h1-text_color">
            {{ title }}
          </div>
          <div>
            {{ sitename }}
            <a
              href="https://t.me/Kostantin_Ippolitov"
              target="_blank"
              rel="noopener"
            >
              <svg
                class="t-sociallinks__svg"
                version="1.1"
                id="Layer_1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="30px"
                height="30px"
                viewBox="0 0 60 60"
                xml:space="preserve"
              >
                <desc>Telegram</desc>
                <path
                  d="M30 0C13.4 0 0 13.4 0 30s13.4 30 30 30 30-13.4 30-30S46.6 0 30 0zm16.9 13.9l-6.7 31.5c-.1.6-.8.9-1.4.6l-10.3-6.9-5.5 5.2c-.5.4-1.2.2-1.4-.4L18 32.7l-9.5-3.9c-.7-.3-.7-1.5 0-1.8l37.1-14.1c.7-.2 1.4.3 1.3 1z"
                ></path>
                <path d="M22.7 40.6l.6-5.8 16.8-16.3-20.2 13.3"></path></svg
            ></a>
          </div>
        </div>
      </h1>
    </div>

    <nav class="navbar navbar-expand-sm navbar-light text-right container">
      <div class="col-xs-1 col-lg-9">
        <button
          class="navbar-toggler"
          type="top"
          data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav">
            <li
              class="nav-item px-4"
              v-for="(url, index) in urlFromDataBase"
              :key="index"
            >
              <div
                v-bind:class="{ active: currentPage == url.link }"
                class="nav-link"
                aria-current="page"
                @click="getPage(url.link, url)"
              >
                <div v-if="url.link != 'page'">
                  {{ url.name_page }}
                </div>
              </div>

              <svg
                v-bind:class="{ active: currentPage == url.link }"
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-heart"
                viewBox="0 0 16 16"
              >
                <path
                  d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"
                />
              </svg>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xs-11 col-lg-3">
        <div class="row text-center">
          <div class="col nav-item">
            <a
              class="nav-link"
              href="https://www.linkedin.com/in/ippolitov-konstantin/"
              target="_blank"
              rel="noreferrer"
              title="Ippolitov Konstantin linkedin's profile"
              aria-label="LinkedIn"
              ><img
                src="/img/icons/icon-linkedin.webp"
                alt=""
                class="header-icon-link"
              />
              <p class="text-center text-xs mt-1">LinkedIn</p>
            </a>
          </div>
          <div class="col nav-item">
            <a
              class="nav-link"
              href="https://github.com/IppolitovTech"
              target="_blank"
              rel="noreferrer"
              aria-label="GitHub"
              ><img
                src="/img/icons/icon-github.webp"
                alt=""
                class="header-icon-link"
              />
              <p class="text-center text-xs mt-1">GitHub</p>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div v-if="currentPage == '/'">
      <home-page :pagedata="pagedata['pages']['home']" />
    </div>

    <div class="container" v-if="currentPage == 'portfolio'">
      <portfolio-page
        :portfolioclose="portfolioclose"
        :portfoliowork="portfoliowork"
      />
    </div>

    <div class="container text-center" v-if="currentPage == 'contacts'">
      <contacts-page :pagedata="pagedata['pages']['contacts']" />
    </div>
    <div class="container" v-if="currentPage == 'page'">
      <one-page :pagedata="pagedata['pages']['current']" />
    </div>
  </div>
</template>
<script src="./HeaderMenu.js"></script>
<style lang="scss">
@import "https://fonts.googleapis.com/css?family=Baloo+Paaji";
$primary-color: #1e90ff;
$secondary-color: #ffe221;
$tertiary-color: #fd7e14;
h2 {
  font-size: 2.5em;
  text-transform: uppercase;
  span {
    width: 100%;
    float: left;
    color: $tertiary-color;
    -webkit-clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 80%);
    clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 80%);
    transform: translateY(-50px);
    opacity: 0;
    animation-name: titleAnimation;
    animation-timing-function: ease;
    animation-duration: 3s;
  }
}

h3 {
  span {
    animation-delay: 4.1s;
    -webkit-animation-fill-mode: forwards;
    &:first-child {
      animation-delay: 4.2s;
    }
    &:last-child {
      color: $secondary-color;
      animation-delay: 4s;
    }
  }
}

.usechrome {
  font-size: 10px;
  color: #fff;
  font-family: helvetica, arial;
  position: absolute;
  bottom: 20px;
  width: 100%;
  text-align: center;
  left: 0;
}

@keyframes titleAnimation {
  0% {
    transform: translateY(-50px);
    opacity: 0;
    -webkit-clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 80%);
    clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 80%);
  }
  20% {
    transform: translateY(0);
    opacity: 1;
    -webkit-clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 15%);
    clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 15%);
  }
  80% {
    transform: translateY(0);
    opacity: 1;
    -webkit-clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 15%);
    clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 15%);
  }
  100% {
    transform: translateY(50px);
    opacity: 0;
    -webkit-clip-path: polygon(100% 0, 100% -0%, 0 100%, 0 100%);
    clip-path: polygon(100% 0, 100% -0%, 0 100%, 0 100%);
  }
}
</style>
<style>
h2 {
  font-size: 2.25rem;
  text-transform: none;
}

.upwork-button {
  background: #14a800;
  color: white;
  height: 2rem;
  width: 15rem;
  border-radius: 50%;
  text-align: center;
}

.footer_text_color {
  color: #fff;
}

.header-icon-link {
  height: 3em;
}

.icon-link {
  height: 3em;
  filter: brightness(132%) contrast(10%);
}

.show-text-box {
  overflow: hidden;
  animation: showDiv 3s forwards;
}

.color {
  color: #feffff;
  background: #fd7e14;
}

.show-text {
  opacity: 0;
  animation: ani 5s forwards;
}

@keyframes ani {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes showDiv {
  0%,
  99% {
    height: 0px;
  }
}

@import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext");
.h1-text_color {
  color: #fd7e14;
}

.main-page-background {
  background: #000;
}

.main-page-background_text {
  color: white;
  text-shadow: 1px 2px black;
  font-size: 2.25rem;
  position: relative;
  top: 8px;
}

.my-name {
  font-size: 3em;
  text-shadow: 0px 2px #dddddd;
}

.my-photo {
  background: url(/img/my-photo.webp) 0% 22% no-repeat;
  height: 435px;
  background-size: 100%;
  border-radius: 50%;
}

/* #Primary
================================================== */

svg.bi.bi-heart.active {
  display: inline-block;
  color: #fd7e14;
}

svg.bi.bi-heart {
  display: none;
}

body {
  font-family: "Poppins", sans-serif;
  font-weight: 400;
  color: #212112;
  background-color: #fff;
  line-height: unset !important;
}

::selection {
  color: #fff;
  background-color: #fd7e14;
}

::-moz-selection {
  color: #fff;
  background-color: #fd7e14;
}

/* #Navigation
================================================== */

.navbar-toggler:active,
.navbar-toggler:focus {
  outline: none;
}

.navbar-light .navbar-toggler-icon {
  width: 24px;
  height: 17px;
  background-image: none;
  position: relative;
  border-bottom: 1px solid #000;
  transition: all 300ms linear;
}

.navbar-light .navbar-toggler-icon:after,
.navbar-light .navbar-toggler-icon:before {
  width: 24px;
  position: absolute;
  height: 1px;
  background-color: #000;
  top: 0;
  left: 0;
  content: "";
  z-index: 2;
  transition: all 300ms linear;
}

.nav-link {
  cursor: pointer;
  color: #212121 !important;
  font-weight: 500;
  transition: all 200ms linear;
}

.nav-item:hover .nav-link {
  color: #fd7e14 !important;
}

.nav-link.active {
  color: #fd7e14 !important;
}

.nav-link {
  position: relative;
  padding: 5px 0 !important;
  display: inline-block;
}

.nav-item:after {
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 100%;
  height: 2px;
  content: "";
  background-color: #fd7e14;
  opacity: 0;
  transition: all 200ms linear;
}

.nav-item:hover:after {
  bottom: 0;
  opacity: 1;
}

.nav-item.active:hover:after {
  opacity: 0;
}

.nav-item {
  position: relative;
  transition: all 200ms linear;
}

@media (max-width: 767px) {
  .nav-item:after {
    display: none;
  }
}
</style>
