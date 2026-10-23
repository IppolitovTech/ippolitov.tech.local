<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-4">
          <div class="my-photo mt-2"></div>
          <div></div>
        </div>
        <div class="col-xs-12 col-lg-8">
          <div class="col show-text-box mt-3">
            <div v-html="pagedata.text"></div>
          </div>
          <div class="col">
            <h2 class="title">
              <span>Hello, nice</span><span> to see</span><span> you here</span>
            </h2>
          </div>
        </div>
      </div>
    </div>

    <div class="col main-page-background text-center">
      <div class="mt-4 main-page-background_text">My specializations:</div>
      <div class="row col-12 footer_text_color mt-4">
        <div class="col">
          <img src="/img/icons/icon-vue.webp" alt="" class="icon-link" />
          <p class="text-xs mt-1">Vue.js</p>
        </div>

        <div class="col">
          <img src="/img/icons/icon-php.webp" alt="" class="icon-link" />
          <p class="text-xs mt-1">PHP</p>
        </div>

        <div class="col">
          <img src="/img/icons/icon-html.webp" alt="" class="icon-link" />
          <p class="text-xs mt-1">HTML</p>
        </div>

        <div class="col">
          <img src="/img/icons/icon-css.webp" alt="" class="icon-link" />
          <p class="text-xs mt-1">CSS</p>
        </div>

        <div class="col">
          <img src="/img/icons/icon-js.webp" alt="" class="icon-link" />
          <p class="text-xs mt-1">JS</p>
        </div>

        <div class="col">
          <img src="/img/icons/icon-github.webp" alt="" class="icon-link" />
          <p class="text-xs mt-1">GitHub</p>
        </div>

        <div class="col">
          <img src="/img/icons/icon-linux.webp" alt="" class="icon-link" />
          <p class="text-xs mt-1">Linux and other OS</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["pagedata"],
};
</script>
