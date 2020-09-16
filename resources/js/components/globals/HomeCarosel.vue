<template>
  <carousel :data="data"></carousel>
</template>

<script>
  export default {
    data() {
      return {
        data: [
          '<div class="example-slide"><img src="/images/banners/s1-min.jpg"/></div>',
          '<div class="example-slide"><img src="/images/banners/s2-min.jpg"/></div>',
          '<div class="example-slide"><img src="/images/banners/s3-min.jpg"/></div>',
          '<div class="example-slide"><img src="/images/banners/s4-min.jpg"/></div>',
          '<div class="example-slide"><img src="/images/banners/s5-min.jpg"/></div>',
        ],
      };
    },
  };
</script>

<style>
  .example-slide {
    align-items: center;
    /*background-color: #666;*/
    color: #999;
    display: flex;
    font-size: 1.5rem;
    justify-content: center;
    min-height: 10rem;
  }
</style>