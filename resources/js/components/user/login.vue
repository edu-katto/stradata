<template>
    About counter Login: <button type="button" @click="count++">count is {{ count }}</button>
</template>
<script setup>
    import { ref } from 'vue'
    const count = ref(0)
</script>
