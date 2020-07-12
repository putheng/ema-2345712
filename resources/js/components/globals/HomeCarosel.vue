<template>
  <carousel :data="data"></carousel>
</template>

<script>
  export default {
    data() {
      return {
        data: [
          '<div class="example-slide"><img src="/app/b1.jpg"/></div>',
          '<div class="example-slide"><img src="/app/b2.jpg"/></div>',
          '<div class="example-slide"><img src="/app/b3.jpg"/></div>',
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