<template>
    <b-container>
        <h3>
            holi soy el index post
        </h3>
        <b-table striped hover small :items="items">
            <template slot="actions" slot-scope="row">
                <table-actions
                @edit="edit"
                @destroy="destroy"
                :item="row.item"
                ></table-actions>
            </template>
        </b-table>
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
                items:[],
            }
        },
        mounted() {
            axios.get(this.module).then((response)=>{
                this.items = response.data.data;
                this.items.forEach((item)=>{
                    item.actions = '';
                })
            });
        },methods:{
            edit(id){
                console.log(id)
            },
            destroy(id){
                console.log(id)
            }
        }
    }
</script>

<style scoped>

</style>