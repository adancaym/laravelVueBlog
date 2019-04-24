<template>
    <b-container>
        <b-table
                striped hover small
                :items="pagination.data"
                :fields="fields"
                v-if="!editMode"
                id="module"
        >
            <template slot="actions" slot-scope="row">
                <table-actions
                @edit="edit"
                @destroy="destroy"
                :item="row.item"
                ></table-actions>
            </template>
        </b-table>
        <b-pagination
                v-model="pagination.current_page"
                :total-rows="pagination.total"
                :per-page="pagination.per_page"
                aria-controls="module"
                align="fill"
        ></b-pagination>
    </b-container>
</template>

<script>
    export default {
        props:['module'],
        name: "post-index",
        component:{
        },
        data(){
            return {
                editMode:false,
                pagination:[],
                fields:[
                    { key: 'title', label: 'Título' },
                    { key: 'contents', label: 'Contenido' },
                    { key: 'actions', label: 'Accciones' },
                ],
            }
        },
        mounted() {
            this.getItems();
        },methods:{
            edit(id){
                this.editMode = true;
                console.log(id)
            },
            destroy(id){
                console.log(id);
                this.getItems();
            },
            save(){
                this.editMode = false;
            },
            getItems(){
                axios.get(this.module).then((response)=>{
                    this.pagination = response.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>