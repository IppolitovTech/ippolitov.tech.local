<template>
  <div>
    <div v-html="pagedata.text"></div>
  </div>
</template>
<script>
export default {
  props: ["pagedata"],
};
</script>
