
<template>
    <new-form
            v-if="editMode"
            :item="item"
            @save="save"
            @exitEditMode="exitEditMode"
    />
    <table-pagination
            v-else
            ref="tablePagination"
            :module="module"
            @edit="edit"
            @destroy="destroy"
    ></table-pagination>
</template>

<script>
    export default {
        props:['module'],
        name: "new-index",
        component:{
        },
        data(){
            return Core.clone(Core.crud.dataCrud)
        },
        mounted() {
        },
        methods: Core.crud.methodsCrud
    }
</script>

<style scoped>

</style>