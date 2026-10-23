<template>
  <div>
    <div class="row">
      <template v-for="item in portfoliowork">
        <div class="col-sx-1 col-md-4">
          <a :href="item.link" class="pointer">
            <div class="view view-fifth">
              <img :src="item.img" />
              <div class="mask">
                <h3>{{ item.header }}</h3>
                <p class="container" v-html="item.text"></p>
              </div>
            </div>
          </a>
        </div>
      </template>
    </div>
  </div>
</template>
<script>
export default {
  props: ["portfoliowork", "portfolioclose"],
  data: function () {
    return {
      urlFromDataBase: this.mainmenulinks,
      currentPage: "/",
      title: "Open journal system developer",
    };
  },
};
</script>
<style>
.view {
  float: left;
  border: 6px solid #fff;
  overflow: hidden;
  position: relative;
  background: black;
  background: #fff url("/img/portfolio/background.webp") repeat;
}

.view .mask,
.view .content {
  width: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  font-size: 16px;
  line-height: 1.6;
}

.view img {
  display: block;
  position: relative;
}

.view-fifth img {
  -webkit-transition: all 1s ease-in-out;
  -moz-transition: all 1s ease-in-out;
  -o-transition: all 1s ease-in-out;
  -ms-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}

img {
  width: auto\9;
  height: auto;
  max-width: 100%;
  vertical-align: middle;
  border: 0;
  -ms-interpolation-mode: bicubic;
}

.view-fifth p,
.view-fifth h3 {
  -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  opacity: 0;
  color: #333;
  -webkit-transition: all 1.25s linear;
  -moz-transition: all 1.25s linear;
  -o-transition: all 1.25s linear;
  -ms-transition: all 1.25s linear;
  transition: all 1.25s linear;
}

.view-fifth:hover .mask {
  -webkit-transform: translateX(0px);
  -moz-transform: translateX(0px);
  -o-transform: translateX(0px);
  -ms-transform: translateX(0px);
  transform: translateX(0px);
}

.view-fifth:hover img {
  -webkit-transform: translateX(100%);
  -moz-transform: translateX(100%);
  -o-transform: translateX(100%);
  -ms-transform: translateX(100%);
  transform: translateX(100%);
}

.view-fifth:hover p {
  -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: alpha(opacity=100);
  opacity: 1;
}

.view-fifth:hover h3 {
  -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: alpha(opacity=100);
  opacity: 1;
}

.view h3 {
  font-family: Tahoma;
  text-transform: uppercase;
  color: #fff;
  text-align: center;
  position: relative;
  font-size: 17px;
  padding: 10px;
  background: rgba(0, 0, 0, 0.8);
  margin: 0px 0 0 0;
  margin-bottom: 10px;
}

.col-sx-1.col-md-4 {
  max-height: 350px;
  overflow: hidden;
  margin-bottom: 15px;
}
</style>
