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
  </div>
</template>
<script>
export default {
  props: ["pagedata"],
};
</script>
