<template>
  <button :disabled="loading"
    class="flex items-center disabled:cursor-not-allowed">
    <div v-if="loading" class="btn-spinner mr-2">
    </div>

    <slot />
  </button>
</template>
<script>
export default {
  props: {
    loading: Boolean,
  }
}
</script>