<template>
  <div v-html="pagedata.text"></div>
</template>
<script>
export default {
  props: ["pagedata"],
};
</script>
