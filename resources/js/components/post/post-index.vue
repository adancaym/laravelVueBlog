
<template>
   <table-pagination :module="module"></table-pagination>
</template>

<script>
    export default {
        props:['module'],
        name: "post-index",
        component:{
        },

        mounted() {

        },methods:{
            edit(item){
            },
            destroy(item){
            },
            save(item){
            },
        }
    }
</script>

<style scoped>

</style>