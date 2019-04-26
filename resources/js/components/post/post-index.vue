
<template>
   <div v-if="editMode">
      <h3 >
         aqui va el form
      </h3>
   </div>
   <table-pagination
           v-else
           ref="tablePagination"
           :module="module"
           @edit="edit"
           @destroy="destroy"
   ></table-pagination></template>

<script>
    export default {
        props:['module'],
        name: "post-index",
        component:{
        },
        data(){
           return Core.clone(Core.crud.dataCrud)
        },
        mounted() {

        },methods: Core.crud.methodsCrud
    }
</script>

<style scoped>

</style>