
<template>
    <b-container>
        <b-table small striped hover dark :items="items" :fields="fields" :current-page="current_page" :per-page="per_page" >
            <template slot="actions" slot-scope="row">
                <table-actions
                        @edit="edit"
                        @destroy="destroy"
                        :item="row.item"
                ></table-actions>
            </template>
        </b-table>
        <b-pagination :total-rows="items.length" :per-page="per_page" v-model="current_page" />
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
                items:[],
                per_page:10,
                current_page:1,
                fields:[],
            }
        },
        mounted() {
            this.getItems();
        },methods:{
            edit(item){
                this.editMode = true;
                this.$emit('edit',item);
            },
            destroy(item){
                this.$emit('destroy',item);
            },
            save(){
                this.editMode = false;

            },
            getItems(){
                axios.get(this.module).then((response)=>{
                    this.items = response.data.items;
                    this.fields = response.data.fields;
                });
            }
        }
    }
</script>

<style scoped>

</style>